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
    
    <!-- Main content -->
    <section class="content">
        @include('admin.common.error')
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ 'Manage ' . $menu }}</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('carts.index') }}" class="btn btn-sm btn-info float-right">
                                    <i class="fa fa-eye pr-1"></i> View Cart
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if(!empty($productsList))
                                @foreach($productsList as $row)
                                    <div class="col-md-3">
                                        <div class="card card-info card-outline">
                                            <div class="card-body box-profile">
                                                <input type="hidden" name="product_id" id="productId_{{ $row['id'] }}" value="{{ $row['id'] }}">
                                                <div class="text-center">
                                                    @if(!empty($row['image']) && file_exists(public_path($row['image'])))
                                                        <img src="{{ asset($row['image']) }}" alt="{{ $row['name'] }}" class="profile-user-img-new img-fluid" style="width: 100px; height: 100px;">
                                                    @else
                                                        <img src="{{ asset('assets/dist/img/no-image.png') }}" alt="No Image Available" class="profile-user-img-new img-fluid" style="width: 100px; height: 100px;">
                                                    @endif
                                                </div>

                                                <h5 class="text-center mt-2 mb-2">{{ $row['name'] }}</h5>

                                                <ul class="list-group list-group mb-3">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span><b>Price :</b></span>
                                                        <span class="float-right">{{ env('CURRENCY') }}{{ number_format($row['price'], 2) }}</span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span><b>QTY : </b></span>
                                                        <div class="float-right">
                                                            <span class="float-right">1</span>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <a href="javascript:void(0)" data-product-id="{{ $row['id'] }}" id="add-cart-btn-{{ $row['id'] }}" class="btn btn-primary btn-block add-to-cart-button"><b>Add to Cart</b></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
