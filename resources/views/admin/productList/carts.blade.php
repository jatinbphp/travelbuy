@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    
    @include('admin.common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => route('user.dashboard'), 'title' => 'Dashboard'],
            ['route' => route('productList.index'), 'title' => 'Shop Now']
        ],
        'active' => $menu
    ])
    <style type="text/css">
        .dataTables_length,#ProductCartTable_filter,.dataTables_info,.dataTables_paginate{display:none}
        #accordion{margin-top:1rem}
        .accordion-container .accordion-title{position:relative;margin:0;padding:.625em .625em .625em 1em;background-color:#ff7602;font-size:1em;font-weight:400;color:#fff;cursor:pointer}
        .accordion-container .accordion-title:hover,.accordion-container .accordion-title:active,.accordion-title.open{background-color:#ff7602}
        .accordion-container .accordion-title::after{content:"";position:absolute;top:17px;right:15px;width:0;height:0;border:8px solid transparent;border-top-color:#fff}
        .accordion-container .accordion-title.open::after{content:"";position:absolute;top:8px;border:8px solid transparent;border-bottom-color:#fff}
        .accordion-content{padding:1em;border:1px solid #ff7602}       
        .accordion-container strong{display: block;}
    </style>
    <section class="content" id="cart-page">
        @include ('admin.common.error')
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('admin.common.card-header', ['title' => 'Manage ' . $menu])
                    </div>
                    <div class="card-body table-responsive">
                        <div class="alert alert-success p-2" id="successMessage" style="display: none;">
                            Quantity updated successfully.
                        </div>

                        {!! Form::hidden('route_name', route('carts.index'), ['id' => 'route_name']) !!}
                        <table id="ProductCartTable" class="table table-bordered table-striped datatable-dynamic">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-right" colspan="4">Sub-Total :</th>
                                    <td id="sub_total"></td> 
                                </tr>
                                <tr>
                                    <th class="text-right" colspan="4">Total :</th>
                                    <td id="grand_total"></td> 
                                </tr>
                            </tfoot>
                        </table> 
                        <hr>
                        <h5>What would you like to do next?</h5>
                        <p>Enter if you have a discount code you want to use.</p>
                        <div id="accordion" class="accordion-container">
                            <h4 class="accordion-title js-accordion-title open">Enter your voucher code here</h4>
                            <div class="accordion-content">
                                {!! Form::open(['id' => 'couponForm', 'class' => 'form-horizontal', 'files' => true]) !!}
                                <input type="hidden" name="grandtotal" id="grandtotal" class="form-control">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <input type="text" name="coupon" placeholder="Enter your voucher code here" id="coupon" class="form-control">
                                        <div class="coupon-error"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="verification_code" placeholder="Enter your voucher verification code here" id="verification_code" class="form-control">
                                        <div class="verification_code-error"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-primary apply-coupon" data-url="{{ route('productList.apply-coupon') }}">Apply Voucher & View Patient Details</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div id="accordion1" class="accordion-container" style="border-top: 1px solid #000;">
                            <h4 class="accordion-title js-accordion-title">Patient Details :</h4>
                            <div class="accordion-content" id="patient-details" style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(function () { 
    $(".js-accordion-title").click(function () {
        $(".open").not(this).removeClass("open").next().slideUp(300);
        $(this).toggleClass("open").next().slideToggle(300);
    });
});

$(document).ready(function() {
    $('#cart-page').on('click', '.apply-coupon', function (event) {
        event.preventDefault();
        $('#loader').removeClass('d-none');
        $('#patient-details').html('');

        $('.text-danger').remove();
        var url = $(this).data('url');
        var formData = $('#couponForm').serializeArray();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(response) {
                $('#loader').addClass('d-none');
                if (response.type === 'success') {
                    $('#accordion .js-accordion-title').removeClass('open');
                    $('#accordion .accordion-content').css('display', 'none');
                    $('#accordion1 .js-accordion-title').addClass('open');
                    $('#coupon').val('');
                    $('#verification_code').val('');
                    $('#patient-details').html(response.data);
                    $('#alert-success').text(response.message);
                    $('#patient-details').css('display', 'block');

                    $('html, body').animate({
                        scrollTop: $('#alert-success').offset().top
                    }, 1000); 

                } else if (response.type === 'error') {
                    swal("Warning!", response.message, "error");
                }
            },
            error: function(xhr) {
                $('#loader').addClass('d-none');
                //if (xhr.status === 422) { 
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {

                        if(key=='coupon'){
                            $('.coupon-error').append(`
                                <span class="text-danger"><strong>${value}</strong></span>
                            `);
                        }

                        if(key=='verification_code'){
                            $('.verification_code-error').append(`
                                <span class="text-danger"><strong>${value}</strong></span>
                            `);
                        }
                    });
                //}
            }
        });
    });

    $('#cart-page').on('click', '.apply-coupon-payment', function (event) {
        event.preventDefault();        
        $('#loader').removeClass('d-none');

        $('.text-danger').remove();
        var url = $(this).data('url');
        var formData = $('#cart-page #couponPaymentForm').serializeArray();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(response) {
                $('#loader').addClass('d-none');
                if (response.type === 'success') {
                    swal("Success!", response.message, "success");
                    setTimeout(function() {
                        window.location.href = "{{ route('productList.index') }}";
                    }, 2000); 
                } else if (response.type === 'error') {
                    swal("Warning!", response.message, "error");
                }
            },
            error: function(xhr) {
                $('#loader').addClass('d-none');
                //if (xhr.status === 422) { 
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {

                        $('.payment-error').append(`
                            <span class="text-danger"><strong>Something went wrong. please try again.</strong></span>
                        `);
                    });
                //}
            }
        });
    });

    var products_carts_table = $('#ProductCartTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 100,
        lengthMenu: [100, 200, 300, 400, 500],
        ajax: {
            url: $("#route_name").val(),
            error: function(xhr, error, thrown) {
                console.log('DataTables AJAX Error:', error, thrown);
            }
        },
        columns: [
            {data: 'product_name', name: 'product_name'},
            {data: 'qty', name: 'qty'},
            {data: 'product_price', name: 'product_price'},
            {data: 'total', name: 'total'},
            {data: 'action', name: 'action', orderable: false},
        ],
        drawCallback: function(settings) {
            updateTotals();
        }
    });

    $(document).on("click", "#plus", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var quantityInput = $('#quantity' + id);
        var currentValue = parseInt(quantityInput.val());
        quantityInput.val(currentValue + 1);
        updateQty(id, 2);
    });

    $(document).on("click", "#minus", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var quantityInput = $('#quantity' + id);
        var currentValue = parseInt(quantityInput.val());
        if (currentValue > 1) {
            quantityInput.val(currentValue - 1);
            updateQty(id, 1);
        }
    });

    var debounceTimer;

    function updateQty(id, type) {
        clearTimeout(debounceTimer); 

        debounceTimer = setTimeout(function() {
            $.ajax({
                url: "{{ route('orders.update_qty') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    type: type
                },
                success: function(data) {
                    reloadCartTable();
                    $('#successMessage').fadeIn().delay(2000).fadeOut();
                },
                error: function(xhr, error, thrown) {
                    console.log('Update Quantity AJAX Error:', error, thrown);
                }
            });
        }, 300); 

        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            $('#successMessage').fadeOut(); 
        }, 2000);
    }

    function reloadCartTable() {
        products_carts_table.ajax.reload(null, false, function() {
            updateTotals();
        });
    }

    function updateTotals() {
        var subTotal = 0;
        var grandTotal = 0;
        var currency = "{{ env('CURRENCY') }}";

        products_carts_table.rows().every(function() {
            var data = this.data();
            var productPrice = parseFloat(data.product_price.replace(/[^\d.-]/g, '')) || 0;
            var qty = parseFloat(data.qty) || 0;
            var total = parseFloat(data.total.replace(/[^\d.-]/g, '')) || 0;

            subTotal += productPrice * qty;
            grandTotal += total;
        });
        $('#grandtotal').val(grandTotal);
        $('#sub_total').text(currency + grandTotal.toFixed(2));
        $('#grand_total').text(currency + grandTotal.toFixed(2));
    }

    $('.datatable-dynamic tbody').on('click', '.deleteCartRecord', function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");

        swal({
            title: "Are you sure?",
            text: "You want to delete this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "{{ route('carts.destroy', ':id') }}".replace(':id', id),
                    type: "DELETE",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                    success: function(data){
                        reloadCartTable();
                        swal("Deleted", "Your data successfully deleted!", "success");
                    }
                });
            } else {
                swal("Cancelled", "Your data safe!", "error");
            }
        });
    });
});
</script>
@endsection