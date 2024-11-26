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
        #accordion{margin-bottom:20px;margin-top:1rem}
        .accordion-container .accordion-title{position:relative;margin:0;padding:.625em .625em .625em 1em;background-color:#ff7602;font-size:1em;font-weight:400;color:#fff;cursor:pointer}
        .accordion-container .accordion-title:hover,.accordion-container .accordion-title:active,.accordion-title.open{background-color:#ff7602}
        .accordion-container .accordion-title::after{content:"";position:absolute;top:17px;right:15px;width:0;height:0;border:8px solid transparent;border-top-color:#fff}
        .accordion-container .accordion-title.open::after{content:"";position:absolute;top:8px;border:8px solid transparent;border-bottom-color:#fff}
        .accordion-content{padding:1em;border:1px solid #ff7602}       
        .accordion-container strong{display: block;}
    </style>
    <section class="content">
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
                        <div class="accordion-container">
                            <h4 class="accordion-title">Enter your voucher code here</h4>
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
                                        <button type="button" id="apply-coupon" class="btn btn-primary" data-url="{{ route('productList.apply-coupon') }}">Apply Voucher and Complete Order</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="accordion-container mt-3" style="display:none;" id="patient-details">
                            <h4 class="accordion-title">Patient Details :</h4>
                            <div class="accordion-content">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Merchant ID :</strong> IAS423817281777</td>
                                            <td><strong>PLU Code :</strong> 2/hv/hvoucher</td>
                                            <td><strong>Quantity :</strong> 10</td>
                                            <td><strong>Voucher Amount :</strong> R10000</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Notification Method :</strong> Email</td>
                                            <td><strong>Email Address / Phone Number :</strong> vijay.g.php@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><strong>Additional Data :</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Molecule :</strong> Xtandi40mgTablets</td>
                                            <td><strong>Nappi Code :</strong> 721978001</td>
                                            <td><strong>Dosage :</strong> 53mg</td>
                                            <td><strong>Patient Name :</strong> Michael</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Patient Surname :</strong> Bosman</td>
                                            <td><strong>Patient ID :</strong> 1111111111111</td>
                                            <td><strong>Patient Medical Scheme Name :</strong> Dental</td>
                                            <td><strong>Patient Medical Scheme Membership Number :</strong> 01101010102</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Pharmacy Name (service point) :</strong> M-KEM 24 HOUR PHARMACY</td>
                                            <td><strong>ICD10 (Medical Classification) :</strong> ICD10</td>
                                            <td><strong>CPT4 (Medical Service/Procedures) :</strong> CPT4</td>
                                            <td colspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><strong>Delivery Address :</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address 1 :</strong> Street Av</td>
                                            <td><strong>Address 2 :</strong> Century City</td>
                                            <td><strong>Suburb :</strong> Milerton</td>
                                            <td><strong>City :</strong> Cape Town</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Region :</strong> Western Cape</td>
                                            <td><strong>Country Code :</strong> ZA</td>
                                            <td><strong>Postal Code :</strong> 7550</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

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
    $('#apply-coupon').click(function(event) {
        event.preventDefault();

        $('#loader').removeClass('d-none');

        $('.text-danger').remove();
        var url = $(this).data('url');
        var formData = $('#couponForm').serializeArray();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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