<div class="row main-div" id="new_divs_{{$childDiv}}">
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'merchantId', 'labelText' => 'Merchant ID', 'isRequired' => true])

        {!! Form::text('merchantId[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Merchant ID']) !!}
    </div>
    {!! Form::hidden('pluCode[' . $childDiv . ']', '2/hv/hvoucher', ['class' => 'form-control']) !!}
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'quantity', 'labelText' => 'Quantity', 'isRequired' => true])

        {!! Form::selectRange('quantity['.$childDiv.']', 1, 100, null, ['class' => 'form-control', 'placeholder' => 'Select Quantity']) !!}
    </div> 
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'voucherAmount', 'labelText' => 'Voucher Amount', 'isRequired' => true])

        {!! Form::text('voucherAmount[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Voucher Amount']) !!}
    </div>
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'notificationMethod', 'labelText' => 'Notification Method', 'isRequired' => true])

        {!! Form::select('notificationMethod[' .$childDiv .']', ['01' => 'Email', '02' => 'SMS'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}
    </div>
    <div class="col-md-12 mb-3">
        @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Email Address / Phone Number', 'isRequired' => true])

        {!! Form::text('notificationAddress[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Email Address / Phone Number']) !!}
    </div>  
    <div class="col-md-12 mb-3">
        @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])
        <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
    </div>  
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'molecule', 'labelText' => 'Molecule', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][molecule]', $productData['name'], ['class' => 'form-control', 'readonly' => true]) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'nappi_code', 'labelText' => 'Nappi Code (including dosage)', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][nappi_code]', $productData['nappy_code'], ['class' => 'form-control', 'readonly' => true]) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'dosage', 'labelText' => 'Dosage', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][dosage]', null, ['class' => 'form-control', 'placeholder' => 'Dosage']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'patient_name', 'labelText' => 'Patient Name', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}
    </div>  
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'patient_surname', 'labelText' => 'Patient Surname', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_surname]', null, ['class' => 'form-control', 'placeholder' => 'Patient Surname']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'patient_id_number', 'labelText' => 'Patient ID', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_id_number]', null, ['class' => 'form-control', 'placeholder' => 'Patient ID']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'patient_medical_scheme_name', 'labelText' => 'Patient Medical Scheme Name', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_medical_scheme_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Medical Scheme Name']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'patient_medical_scheme', 'labelText' => 'Patient Medical Scheme Membership Number', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_medical_scheme]', null, ['class' => 'form-control', 'placeholder' => 'Patient Medical Scheme']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'pharmacy_name', 'labelText' => 'Pharmacy Name (service point)', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][pharmacy_name]', null, ['class' => 'form-control', 'placeholder' => 'Pharmacy Name (service point)']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'ICD10', 'labelText' => 'ICD10 (Medical Classification)', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][ICD10]', null, ['class' => 'form-control', 'placeholder' => 'ICD10 (Medical Classification)']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'CPT4', 'labelText' => 'CPT4 (Medical Service/Procedures)', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][CPT4]', null, ['class' => 'form-control', 'placeholder' => 'CPT4 (Medical Service/Procedures)']) !!}
    </div>
    <div class="col-md-12 mb-3">
        @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Delivery Address', 'isRequired' => true])
        <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'address_1', 'labelText' => 'Address 1', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][address_1]', null, ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'address_2', 'labelText' => 'Address 2', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][address_2]', null, ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'suburb', 'labelText' => 'Suburb', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][suburb]', null, ['class' => 'form-control', 'placeholder' => 'Suburb']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'city', 'labelText' => 'City', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][city]', null, ['class' => 'form-control', 'placeholder' => 'City']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'region', 'labelText' => 'Region', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][region]', null, ['class' => 'form-control', 'placeholder' => 'Region']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'country_code', 'labelText' => 'Country Code', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][country_code]', null, ['class' => 'form-control', 'placeholder' => 'Country Code']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'postal_code', 'labelText' => 'Postal Code', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][postal_code]', null, ['class' => 'form-control', 'placeholder' => 'Postal Code']) !!}
    </div>
    <div class="action-button col-md-2" style="margin-top: 30px;">
        <button type="button" class="btn btn-danger mr-1" onClick="removeChildRow({{$childDiv}}, 1)"><i class="fa fa-trash"></i></button>
    </div>
</div>