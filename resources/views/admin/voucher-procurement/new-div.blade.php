<div class="row main-div" id="new_divs_{{$childDiv}}">
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'merchantId', 'labelText' => 'Merchant ID', 'isRequired' => true])

        {!! Form::text('merchantId[' . $childDiv . ']', Session::get('loginData')['name'], ['class' => 'form-control', 'placeholder' => 'Merchant ID', 'readonly' => true]) !!}
    </div>
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'pluCode', 'labelText' => 'PLU Code', 'isRequired' => true])

        {!! Form::select('pluCode[' .$childDiv .']', ['2' => '2', 'hv' => 'hv', 'hvoucher' => 'hvoucher'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}
    </div>
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

        {!! Form::select('notificationMethod[' .$childDiv .']', ['Email' => 'Email', 'SMS' => 'SMS'], null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}
    </div>
    <div class="col-md-9 mb-3">
        @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Notification Address', 'isRequired' => true])

        {!! Form::text('notificationAddress[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Notification Address']) !!}
    </div>  

    <div class="col-md-12 mb-3">
        @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])
        <hr class="m-0 p-0" style="border-top: 1px solid #ff7602;">
    </div>  
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'patient_name', 'labelText' => 'Patient Name', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_name]', null, ['class' => 'form-control', 'placeholder' => 'Patient Name']) !!}
    </div>  
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'patient_surname', 'labelText' => 'Patient Surname', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_surname]', null, ['class' => 'form-control', 'placeholder' => 'Patient Surname']) !!}
    </div>
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'patient_id_number', 'labelText' => 'Patient Id Number', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][patient_id_number]', null, ['class' => 'form-control', 'placeholder' => 'Patient Id Number']) !!}
    </div>
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'ICD10', 'labelText' => 'ICD10', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][ICD10]', null, ['class' => 'form-control', 'placeholder' => 'ICD10']) !!}
    </div>
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'CPT4', 'labelText' => 'CPT4', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][CPT4]', null, ['class' => 'form-control', 'placeholder' => 'CPT4']) !!}
    </div>
    <div class="col-md-3 mb-3">
        @include('admin.common.label', ['field' => 'molecule', 'labelText' => 'Molecule', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][molecule]', null, ['class' => 'form-control', 'placeholder' => 'Molecule']) !!}
    </div>
    <div class="col-md-6 mb-3">
        @include('admin.common.label', ['field' => 'nappi_code', 'labelText' => 'Nappi Code', 'isRequired' => true])

        {!! Form::text('additionalData['.$childDiv.'][nappi_code]', null, ['class' => 'form-control', 'placeholder' => 'Nappi Code']) !!}
    </div> 
    <div class="action-button col-md-2 mb-1">
        <button type="button" class="btn btn-danger mr-1" onClick="removeChildRow({{$childDiv}}, 1)"><i class="fa fa-trash"></i></button>
    </div>
</div>