@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    @include('admin.common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => route('user.dashboard'), 'title' => 'Dashboard'],
        ],
        'active' => $menu
    ])

    <style type="text/css">
        .main-div{border-top: 2px solid #ff7602; padding-top: 10px;}
    </style>
    <section class="content">
        @include ('admin.common.error')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('admin.common.card-header', ['title' => '' . $menu])
                    </div>
                    {!! Form::open(['url' => route('voucher-procurement.store'), 'id' => 'voucherProcurementForm', 'class' => 'form-horizontal','files'=>true]) !!}
                        <div class="card-body">
                            {!! Form::hidden('redirects_to', URL::previous()) !!}

                            <div class="row">
                                <div class="col-md-12" id="extraDiv">
                                    @php
                                    $ii = 1;
                                    @endphp
                                    @if(old('batchIdentifier'))
                                        @foreach(old('batchIdentifier', []) as $index => $batchIdentifier)
                                            <div class="row @if($ii!=1) main-div @endif" id="new_divs_{{$ii}}">      

                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'batchIdentifier', 'labelText' => 'Batch Identifier', 'isRequired' => true])

                                                    {!! Form::text('batchIdentifier['.$index.']', null, ['class' => 'form-control text-sm p-1', 'placeholder' => 'Batch Identifier']) !!}

                                                    @error("batchIdentifier.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'rrn', 'labelText' => 'RRN', 'isRequired' => true])

                                                    {!! Form::text('rrn['.$index.']',null, ['class' => 'form-control', 'placeholder' => 'RRN']) !!}

                                                    @error("rrn.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'MerchantID', 'labelText' => 'Merchant ID', 'isRequired' => true])

                                                    {!! Form::text('MerchantID['.$index.']', Session::get('loginData')['name'], ['class' => 'form-control', 'placeholder' => 'Merchant ID', 'readonly' => true]) !!}

                                                    @error("MerchantID.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'cardNumber', 'labelText' => 'Card Number', 'isRequired' => true])

                                                    {!! Form::text('cardNumber['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Card Number']) !!}

                                                    @error("cardNumber.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'pluCode', 'labelText' => 'PLU Code', 'isRequired' => true])

                                                    {!! Form::text('pluCode['.$index.']',null, ['class' => 'form-control', 'placeholder' => 'PLU Code']) !!}

                                                    @error("pluCode.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'quantity', 'labelText' => 'Quantity', 'isRequired' => true])

                                                    {!! Form::text('quantity['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}

                                                    @error("quantity.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'voucherAmount', 'labelText' => 'Voucher Amount', 'isRequired' => true])

                                                    {!! Form::text('voucherAmount['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Voucher Amount']) !!}

                                                    @error("voucherAmount.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'notificationMethod', 'labelText' => 'Notification Method', 'isRequired' => true])

                                                    {!! Form::text('notificationMethod['.$index.']',null, ['class' => 'form-control', 'placeholder' => 'Notification Method']) !!}

                                                    @error("notificationMethod.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Notification Address', 'isRequired' => true])

                                                    {!! Form::text('notificationAddress['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Notification Address']) !!}

                                                    @error("notificationAddress.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>  
                                                <div class="col-md-10 mb-3">
                                                    @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])

                                                    {!! Form::textarea('additionalData['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Additional Data', 'rows' => 3]) !!}

                                                    @error("additionalData.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>  
                                                <div class="action-button col-md-2" style="padding-top: 30px;">
                                                    <div>
                                                        {!! Form::button('<i class="fa fa-trash"></i>', [
                                                            'type' => 'button',
                                                            'class' => 'btn btn-danger',
                                                            'onclick' => "removeChildRow({$ii}, 1)"
                                                        ]) !!}
                                                        
                                                        @if($ii==1)
                                                            {!! Form::button('<i class="fa fa-plus"></i>', [
                                                                'type' => 'button',
                                                                'class' => 'btn btn-info add-option',
                                                                'id' => 'childBtn',
                                                            ]) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @php $ii++; @endphp
                                        @endforeach
                                    @else 

                                        <div class="row" id="new_divs_1">
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'batchIdentifier', 'labelText' => 'Batch Identifier', 'isRequired' => true])

                                                {!! Form::text('batchIdentifier[0]', null, ['class' => 'form-control text-sm p-1', 'placeholder' => 'Batch Identifier']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'rrn', 'labelText' => 'RRN', 'isRequired' => true])

                                                {!! Form::text('rrn[0]',null, ['class' => 'form-control', 'placeholder' => 'RRN']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'MerchantID', 'labelText' => 'Merchant ID', 'isRequired' => true])

                                                {!! Form::text('MerchantID[0]', Session::get('loginData')['name'], ['class' => 'form-control', 'placeholder' => 'Merchant ID', 'readonly' => true]) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'cardNumber', 'labelText' => 'Card Number', 'isRequired' => true])

                                                {!! Form::text('cardNumber[0]', null, ['class' => 'form-control', 'placeholder' => 'Card Number']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'pluCode', 'labelText' => 'PLU Code', 'isRequired' => true])

                                                {!! Form::text('pluCode[0]',null, ['class' => 'form-control', 'placeholder' => 'PLU Code']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'quantity', 'labelText' => 'Quantity', 'isRequired' => true])

                                                {!! Form::text('quantity[0]', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'voucherAmount', 'labelText' => 'Voucher Amount', 'isRequired' => true])

                                                {!! Form::text('voucherAmount[0]', null, ['class' => 'form-control', 'placeholder' => 'Voucher Amount']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'notificationMethod', 'labelText' => 'Notification Method', 'isRequired' => true])

                                                {!! Form::text('notificationMethod[0]',null, ['class' => 'form-control', 'placeholder' => 'Notification Method']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Notification Address', 'isRequired' => true])

                                                {!! Form::text('notificationAddress[0]', null, ['class' => 'form-control', 'placeholder' => 'Notification Address']) !!}
                                            </div>  
                                            <div class="col-md-10 mb-3">
                                                @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])

                                                {!! Form::textarea('additionalData[0]', null, ['class' => 'form-control', 'placeholder' => 'Additional Data', 'rows' => 3]) !!}
                                            </div>  
                                            <div class="action-button col-md-2" style="padding-top: 30px;">
                                                {!! Form::button('<i class="fa fa-trash"></i>', [
                                                    'type' => 'button',
                                                    'class' => 'btn btn-danger',
                                                    'onclick' => 'removeChildRow(1, 1)'
                                                ]) !!}

                                                {!! Form::button('<i class="fa fa-plus"></i>', [
                                                    'type' => 'button',
                                                    'class' => 'btn btn-info add-option',
                                                    'id' => 'childBtn',
                                                ]) !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-info float-right" type="submit"><i class="fa fa-save pr-1"></i> Submit</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>

@section('jquery')
<script type="text/javascript">
var childDiv = {{$ii}};
var childCnt = 1;

$(document).ready(function() {
    var count = $('[id^="new_divs_"]').filter(function() {
        return this.id.match(/^new_divs_\d+$/);
    }).length;

    childCnt = count;
});

$('#childBtn').on('click', function(){
    childDiv = childDiv + 1;

    $.ajax({
        url: "{{route('voucher-procurement.new-div')}}",
        type: "POST",
        data: {
            _token: '{{csrf_token()}}',
            'childDiv': childDiv,
         },
        success: function(data){                        
            $('#extraDiv').append(data);
            childCnt++;
        }
    });
});

function removeChildRow(divId, type){
    const removeRowAlert = createOptionAlert("Are you sure?", "Do want to delete this row", "warning");
    swal(removeRowAlert, function(isConfirm) {
        if (isConfirm) {
            var flag =  deleteRow(divId, type);
            if(flag){
                swal.close();
                childCnt--;
            }
        } else{
             swal("Cancelled", "Your data safe!", "error");
        }
    });
}

//remove the row
function deleteRow(divId, type){
    if(type==1){
        if($('#extraDiv').children('div').length <= 1){
            swal("Error", "You cannot remove all children.", "error");
            return 0;
        }
        var mainDiv = $('#new_divs_'+divId);
        var divWithAddOptionClass = mainDiv.find('.add-option').closest('.row');
        if(divWithAddOptionClass.length > 0){
            var addButton = divWithAddOptionClass.find('.add-option');
            var secondDiv = mainDiv.next('.row');
            var colMd2Div = secondDiv.find('.action-button');
            addButton.detach();
            colMd2Div.append(addButton);
        }
        $('#new_divs_'+divId).remove();
    }
    return 1;
}

function createOptionAlert(title, text, type) {
    return {
        title: title,
        text: text,
        type: type,
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, Delete',
        cancelButtonText: "No, cancel",
        closeOnConfirm: false,
        closeOnCancel: false
    };
}
</script>
@endsection

@endsection