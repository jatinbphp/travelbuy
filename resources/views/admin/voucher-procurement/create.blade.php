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
                                    @if(old('pluCode'))
                                        @foreach(old('pluCode', []) as $index => $merchantIdData)
                                            <div class="row @if($ii!=1) main-div @endif" id="new_divs_{{$ii}}">      
                                                <div class="col-md-3 mb-3">
                                                    @include('admin.common.label', ['field' => 'merchantId', 'labelText' => 'Merchant ID', 'isRequired' => true])

                                                    {!! Form::text('merchantId['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Merchant ID']) !!}

                                                    @error("merchantId.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                {!! Form::hidden('pluCode[' . $index . ']', '2/hv/hvoucher', ['class' => 'form-control']) !!}
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

                                                    {!! Form::select('notificationMethod[' .$index .']', ['03' => 'Email', '01' => 'SMS'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}

                                                    @error("notificationMethod.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Email Address / Phone Number', 'isRequired' => true])

                                                    {!! Form::text('notificationAddress['.$index.']', null, ['class' => 'form-control', 'placeholder' => 'Email Address / Phone Number']) !!}

                                                    @error("notificationAddress.{$index}")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>  
                                                <div class="col-md-12 mb-3">
                                                    @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])
                                                    <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
                                                </div>  
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'molecule', 'labelText' => 'Molecule', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][molecule]', $productData['name'], ['class' => 'form-control', 'readonly' => true]) !!}
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'nappi_code', 'labelText' => 'Nappi Code (including dosage)', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][nappi_code]', $productData['nappy_code'], ['class' => 'form-control', 'readonly' => true]) !!}
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'dosage', 'labelText' => 'Dosage', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][dosage]', null, ['class' => 'form-control', 'placeholder' => 'Dosage']) !!}

                                                    @error("additionalData.{$index}.dosage")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_name', 'labelText' => 'Patient Name', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}

                                                    @error("additionalData.{$index}.patient_name")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>  
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_surname', 'labelText' => 'Patient Surname', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_surname]', null, ['class' => 'form-control', 'placeholder' => 'Patient Surname']) !!}

                                                    @error("additionalData.{$index}.patient_surname")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_id_number', 'labelText' => 'Patient ID', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_id_number]', null, ['class' => 'form-control', 'placeholder' => 'Patient ID']) !!}

                                                    @error("additionalData.{$index}.patient_id_number")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_medical_scheme_name', 'labelText' => 'Patient Medical Scheme Name', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_medical_scheme_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Medical Scheme Name']) !!}

                                                    @error("additionalData.{$index}.patient_medical_scheme_name")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'patient_medical_scheme', 'labelText' => 'Patient Medical Scheme Membership Number', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][patient_medical_scheme]', null, ['class' => 'form-control', 'placeholder' => 'Patient Medical Scheme']) !!}

                                                    @error("additionalData.{$index}.patient_medical_scheme")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'pharmacy_name', 'labelText' => 'Pharmacy Name (service point)', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][pharmacy_name]', null, ['class' => 'form-control', 'placeholder' => 'Pharmacy Name (service point)']) !!}

                                                    @error("additionalData.{$index}.pharmacy_name")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'ICD10', 'labelText' => 'ICD10 (Medical Classification)', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][ICD10]', null, ['class' => 'form-control', 'placeholder' => 'ICD10 (Medical Classification)']) !!}

                                                    @error("additionalData.{$index}.ICD10")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'CPT4', 'labelText' => 'CPT4 (Medical Service/Procedures)', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][CPT4]', null, ['class' => 'form-control', 'placeholder' => 'CPT4 (Medical Service/Procedures)']) !!}

                                                    @error("additionalData.{$index}.CPT4")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Delivery Address', 'isRequired' => true])
                                                    <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'address_1', 'labelText' => 'Address 1', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][address_1]', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}

                                                    @error("additionalData.{$index}.address_1")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'address_2', 'labelText' => 'Address 2', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][address_2]', null, ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}

                                                    @error("additionalData.{$index}.address_2")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'suburb', 'labelText' => 'Suburb', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][suburb]', null, ['class' => 'form-control', 'placeholder' => 'Suburb']) !!}

                                                    @error("additionalData.{$index}.suburb")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'city', 'labelText' => 'City', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][city]', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}

                                                    @error("additionalData.{$index}.city")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'region', 'labelText' => 'Region', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][region]', null, ['class' => 'form-control', 'placeholder' => 'Region']) !!}

                                                    @error("additionalData.{$index}.region")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'country_code', 'labelText' => 'Country Code', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][country_code]', null, ['class' => 'form-control', 'placeholder' => 'Country Code']) !!}

                                                    @error("additionalData.{$index}.country_code")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    @include('admin.common.label', ['field' => 'postal_code', 'labelText' => 'Postal Code', 'isRequired' => true])

                                                    {!! Form::text('additionalData['.$index.'][postal_code]', null, ['class' => 'form-control', 'placeholder' => 'Postal Code']) !!}

                                                    @error("additionalData.{$index}.postal_code")
                                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                                <div class="action-button col-md-2" style="margin-top: 30px;">
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

                                                {!! Form::text('merchantId[0]', null, ['class' => 'form-control', 'placeholder' => 'Merchant ID']) !!}
                                            </div>
                                            {!! Form::hidden('pluCode[0]', '2/hv/hvoucher', ['class' => 'form-control']) !!}
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

                                                {!! Form::select('notificationMethod[0]', ['03' => 'Email', '01' => 'SMS'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Email Address / Phone Number', 'isRequired' => true])

                                                {!! Form::text('notificationAddress[0]', null, ['class' => 'form-control', 'placeholder' => 'Email Address / Phone Number']) !!}
                                            </div>  
                                            <div class="col-md-12 mb-3">
                                                @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])
                                                <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
                                            </div>  
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'molecule', 'labelText' => 'Molecule', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][molecule]', $productData['name'], ['class' => 'form-control', 'readonly' => true]) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'nappi_code', 'labelText' => 'Nappi Code (including dosage)', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][nappi_code]', $productData['nappy_code'], ['class' => 'form-control', 'readonly' => true]) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'dosage', 'labelText' => 'Dosage', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][dosage]', null, ['class' => 'form-control', 'placeholder' => 'Dosage']) !!}
                                            </div> 
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_name', 'labelText' => 'Patient Name', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}
                                            </div>  
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_surname', 'labelText' => 'Patient Surname', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_surname]', null, ['class' => 'form-control', 'placeholder' => 'Patient Surname']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_id_number', 'labelText' => 'Patient ID', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_id_number]', null, ['class' => 'form-control', 'placeholder' => 'Patient ID']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_medical_scheme_name', 'labelText' => 'Patient Medical Scheme Name', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_medical_scheme_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Medical Scheme Name']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'patient_medical_scheme', 'labelText' => 'Patient Medical Scheme Membership Number', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][patient_medical_scheme]', null, ['class' => 'form-control', 'placeholder' => 'Patient Medical Scheme']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'pharmacy_name', 'labelText' => 'Pharmacy Name (service point)', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][pharmacy_name]', null, ['class' => 'form-control', 'placeholder' => 'Pharmacy Name (service point)']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'ICD10', 'labelText' => 'ICD10 (Medical Classification)', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][ICD10]', null, ['class' => 'form-control', 'placeholder' => 'ICD10 (Medical Classification)']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'CPT4', 'labelText' => 'CPT4 (Medical Service/Procedures)', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][CPT4]', null, ['class' => 'form-control', 'placeholder' => 'CPT4 (Medical Service/Procedures)']) !!}
                                            </div>
                                                
                                            <div class="col-md-12 mb-3">
                                                @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Delivery Address', 'isRequired' => true])
                                                <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'address_1', 'labelText' => 'Address 1', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][address_1]', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'address_2', 'labelText' => 'Address 2', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][address_2]', null, ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'suburb', 'labelText' => 'Suburb', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][suburb]', null, ['class' => 'form-control', 'placeholder' => 'Suburb']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'city', 'labelText' => 'City', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][city]', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'region', 'labelText' => 'Region', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][region]', null, ['class' => 'form-control', 'placeholder' => 'Region']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'country_code', 'labelText' => 'Country Code', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][country_code]', null, ['class' => 'form-control', 'placeholder' => 'Country Code']) !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                @include('admin.common.label', ['field' => 'postal_code', 'labelText' => 'Postal Code', 'isRequired' => true])

                                                {!! Form::text('additionalData[0][postal_code]', null, ['class' => 'form-control', 'placeholder' => 'Postal Code']) !!}
                                            </div>
                                            <div class="action-button col-md-2" style="margin-top: 30px;">
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