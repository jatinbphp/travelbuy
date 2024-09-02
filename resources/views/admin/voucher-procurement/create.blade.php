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
                                    @if(old('merchantId'))
                                        @foreach(old('merchantId', []) as $index => $merchantIdData)
                                            <div class="row @if($ii!=1) main-div @endif" id="new_divs_{{$ii}}">      
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'merchantId', 'labelText' => 'Merchant ID', 'isRequired' => true])

                                                    {!! Form::text('merchantId['.$index.']', Session::get('loginData')['name'], ['class' => 'form-control', 'placeholder' => 'Merchant ID', 'readonly' => true]) !!}

                                                    @error("merchantId.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'pluCode', 'labelText' => 'PLU Code', 'isRequired' => true])

                                                    {!! Form::select('pluCode['.$index.']', ['2' => '2', 'hv' => 'hv', 'hvoucher' => 'hvoucher'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}

                                                    @error("pluCode.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'quantity', 'labelText' => 'Quantity', 'isRequired' => true])

                                                    {!! Form::selectRange('quantity['.$index.']', 1, 100, null, ['class' => 'form-control', 'placeholder' => 'Select Quantity']) !!}

                                                    @error("quantity.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div> 
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'voucherAmount', 'labelText' => 'Voucher Amount', 'isRequired' => true])

                                                    {!! Form::text('voucherAmount['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Voucher Amount']) !!}

                                                    @error("voucherAmount.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'notificationMethod', 'labelText' => 'Notification Method', 'isRequired' => true])

                                                    {!! Form::select('notificationMethod[' .$index .']', ['Email' => 'Email', 'SMS' => 'SMS'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}

                                                    @error("notificationMethod.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-9 mb-3">
                                                    @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Notification Address', 'isRequired' => true])

                                                    {!! Form::text('notificationAddress['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Notification Address']) !!}

                                                    @error("notificationAddress.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>  
                                                <div class="col-md-12 mb-3">
                                                    @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])
                                                    <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
                                                </div>  
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_name', 'labelText' => 'Patient Name', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}

                                                    @error("additionalData.{$index}.patient_name")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>  
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_surname', 'labelText' => 'Patient Surname', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_surname]', null, ['class' => 'form-control', 'placeholder' => 'Patient Surname']) !!}

                                                    @error("additionalData.{$index}.patient_surname")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_id_number', 'labelText' => 'Patient Id Number', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_id_number]', null, ['class' => 'form-control', 'placeholder' => 'Patient Id Number']) !!}

                                                    @error("additionalData.{$index}.patient_id_number")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'ICD10', 'labelText' => 'ICD10', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][ICD10]', null, ['class' => 'form-control', 'placeholder' => 'ICD10']) !!}

                                                    @error("additionalData.{$index}.ICD10")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'CPT4', 'labelText' => 'CPT4', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][CPT4]', null, ['class' => 'form-control', 'placeholder' => 'CPT4']) !!}

                                                    @error("additionalData.{$index}.CPT4")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'molecule', 'labelText' => 'Molecule', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][molecule]', null, ['class' => 'form-control', 'placeholder' => 'Molecule']) !!}

                                                    @error("additionalData.{$index}.molecule")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    @include('admin.common.label', ['field' => 'nappi_code', 'labelText' => 'Nappi Code', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][nappi_code]', null, ['class' => 'form-control', 'placeholder' => 'Nappi Code']) !!}

                                                    @error("additionalData.{$index}.nappi_code")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="action-button col-md-2  mb-1">
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
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'merchantId', 'labelText' => 'Merchant ID', 'isRequired' => true])

                                                {!! Form::text('merchantId[0]', Session::get('loginData')['name'], ['class' => 'form-control', 'placeholder' => 'Merchant ID', 'readonly' => true]) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'pluCode', 'labelText' => 'PLU Code', 'isRequired' => true])

                                                {!! Form::select('pluCode[0]', ['2' => '2', 'hv' => 'hv', 'hvoucher' => 'hvoucher'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'quantity', 'labelText' => 'Quantity', 'isRequired' => true])

                                                {!! Form::selectRange('quantity[0]', 1, 100, null, ['class' => 'form-control', 'placeholder' => 'Select Quantity']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'voucherAmount', 'labelText' => 'Voucher Amount', 'isRequired' => true])

                                                {!! Form::text('voucherAmount[0]', null, ['class' => 'form-control', 'placeholder' => 'Voucher Amount']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'notificationMethod', 'labelText' => 'Notification Method', 'isRequired' => true])

                                                {!! Form::select('notificationMethod[0]', ['Email' => 'Email', 'SMS' => 'SMS'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}
                                            </div>
                                            <div class="col-md-9 mb-3">
                                                @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Notification Address', 'isRequired' => true])

                                                {!! Form::text('notificationAddress[0]', null, ['class' => 'form-control', 'placeholder' => 'Notification Address']) !!}
                                            </div>  
                                            <div class="col-md-12 mb-3">
                                                @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])
                                                <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
                                            </div>  
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_name', 'labelText' => 'Patient Name', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}
                                            </div>  
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_surname', 'labelText' => 'Patient Surname', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_surname]', null, ['class' => 'form-control', 'placeholder' => 'Patient Surname']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_id_number', 'labelText' => 'Patient Id Number', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_id_number]', null, ['class' => 'form-control', 'placeholder' => 'Patient Id Number']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'ICD10', 'labelText' => 'ICD10', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][ICD10]', null, ['class' => 'form-control', 'placeholder' => 'ICD10']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'CPT4', 'labelText' => 'CPT4', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][CPT4]', null, ['class' => 'form-control', 'placeholder' => 'CPT4']) !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                @include('admin.common.label', ['field' => 'molecule', 'labelText' => 'Molecule', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][molecule]', null, ['class' => 'form-control', 'placeholder' => 'Molecule']) !!}
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                @include('admin.common.label', ['field' => 'nappi_code', 'labelText' => 'Nappi Code', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][nappi_code]', null, ['class' => 'form-control', 'placeholder' => 'Nappi Code']) !!}
                                            </div>

                                            <div class="action-button col-md-2 mb-1">
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