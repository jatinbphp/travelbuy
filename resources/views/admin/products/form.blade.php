{!! Form::hidden('redirects_to', URL::previous()) !!}
@if(isset($user))
    @include('admin.common.password-alert')
@endif
<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            @include('admin.common.label', ['field' => 'name', 'labelText' => 'Name', 'isRequired' => true])

            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name', 'id' => 'name']) !!}

            @include('admin.common.errors', ['field' => 'name'])
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('nappy_code') ? ' has-error' : '' }}">
            @include('admin.common.label', ['field' => 'nappy_code', 'labelText' => 'Nappi Code', 'isRequired' => true])

            {!! Form::text('nappy_code', null, ['class' => 'form-control', 'placeholder' => 'Enter Nappi Code', 'id' => 'nappy_code']) !!}

            @include('admin.common.errors', ['field' => 'nappy_code'])
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            @include('admin.common.label', ['field' => 'price', 'labelText' => 'Price', 'isRequired' => true])

            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price', 'id' => 'price']) !!}

            @include('admin.common.errors', ['field' => 'price'])
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            @include('admin.common.label', ['field' => 'status', 'labelText' => 'Status', 'isRequired' => false])
            
            @include('admin.common.active-inactive-buttons', [                
                'checkedKey' => isset($product) ? $product->status : 'active'
            ])
            <span class="text-danger"><strong>If you select this product as active, other products will become inactive.</strong></span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
            @include('admin.common.label', ['field' => 'image', 'labelText' => 'Image', 'isRequired' => false])
            <div class="">
                <div class="fileError">
                    {!! Form::file('image', ['class' => '', 'id'=> 'image','accept'=>'image/*', 'onChange'=>'AjaxUploadImage(this)']) !!}
                </div>
                
                @if(!empty($product['image']) && file_exists(public_path($product['image'])))
                    <img src="{{asset($product['image'])}}" alt="User Image" style="border: 1px solid #ccc;margin-top: 5px;" width="150" id="DisplayImage">
                @else
                    <img src=" {{url('assets/dist/img/no-image.png')}}" alt="User Image" style="border: 1px solid #ccc;margin-top: 5px;padding: 20px;" width="150" id="DisplayImage">
                @endif
            </div>
        </div>
    </div>
</div>