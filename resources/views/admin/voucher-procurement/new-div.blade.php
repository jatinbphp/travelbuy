<div class="row main-div" id="new_divs_{{$childDiv}}">
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'batchIdentifier', 'labelText' => 'Batch Identifier', 'isRequired' => true])

        {!! Form::text('batchIdentifier[' . $childDiv . ']', null, ['class' => 'form-control text-sm p-1', 'placeholder' => 'Batch Identifier']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'rrn', 'labelText' => 'RRN', 'isRequired' => true])

        {!! Form::text('rrn[' . $childDiv . ']',null, ['class' => 'form-control', 'placeholder' => 'RRN']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'MerchantID', 'labelText' => 'Merchant ID', 'isRequired' => true])

        {!! Form::text('MerchantID[' . $childDiv . ']', Session::get('loginData')['name'], ['class' => 'form-control', 'placeholder' => 'Merchant ID', 'readonly' => true]) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'cardNumber', 'labelText' => 'Card Number', 'isRequired' => true])

        {!! Form::text('cardNumber[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Card Number']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'pluCode', 'labelText' => 'PLU Code', 'isRequired' => true])

        {!! Form::text('pluCode[' . $childDiv . ']',null, ['class' => 'form-control', 'placeholder' => 'PLU Code']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'quantity', 'labelText' => 'Quantity', 'isRequired' => true])

        {!! Form::text('quantity[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
    </div> 
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'voucherAmount', 'labelText' => 'Voucher Amount', 'isRequired' => true])

        {!! Form::text('voucherAmount[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Voucher Amount']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'notificationMethod', 'labelText' => 'Notification Method', 'isRequired' => true])

        {!! Form::text('notificationMethod[' . $childDiv . ']',null, ['class' => 'form-control', 'placeholder' => 'Notification Method']) !!}
    </div>
    <div class="col-md-4 mb-3">
        @include('admin.common.label', ['field' => 'notificationAddress', 'labelText' => 'Notification Address', 'isRequired' => true])

        {!! Form::text('notificationAddress[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Notification Address']) !!}
    </div>  
    <div class="col-md-10 mb-3">
        @include('admin.common.label', ['field' => 'additionalData', 'labelText' => 'Additional Data', 'isRequired' => true])

        {!! Form::textarea('additionalData[' . $childDiv . ']', null, ['class' => 'form-control', 'placeholder' => 'Additional Data', 'rows' => 3]) !!}
    </div>  
    <div class="action-button col-md-2" style="padding-top: 30px;">
        <button type="button" class="btn btn-danger mr-1" onClick="removeChildRow({{$childDiv}}, 1)"><i class="fa fa-trash"></i></button>
    </div>
</div>