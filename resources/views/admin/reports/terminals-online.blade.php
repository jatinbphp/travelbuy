@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    @include('admin.common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => route('user.dashboard'), 'title' => 'Dashboard'],
            ['route' => route('user.reports.terminals-online'), 'title' => 'Reports']
        ],
        'active' => $menu
    ])

    <!-- Main content -->
    <section class="content">
        @include ('admin.common.error')
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('admin.common.card-header', ['title' => 'Manage ' . $menu])
                    </div>
                    <div class="card-body table-responsive">
                        <input type="hidden" id="route_name" value="{{ route('user.reports.terminals-online') }}">
                        <table id="terminalsOnlineTable" class="table table-bordered table-striped datatable-dynamic">
                            <thead>
                                <tr>
                                    <th>Row Id</th>
                                    <!-- <th>Unique Id</th> -->
                                    <th>Merchant Id</th>
                                    <th>Merchant Name</th>
                                    <th>Terminal Id</th>
                                    <th>Terminal Name</th>
                                    <!-- <th>Status Code</th> -->
                                    <th>Status</th>
                                    <!-- <th>terminalOwnerId</th>
                                    <th>terminalOwnerName</th>
                                    <th>receivingCardAcceptorIdCode1</th> -->
                                    <th>Type</th>
                                    <th>Model</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection