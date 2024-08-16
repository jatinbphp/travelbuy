@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    @include('admin.common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => route('user.dashboard'), 'title' => 'Dashboard'],
            ['route' => route('user.reports.account-transactions'), 'title' => 'Reports']
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
                        <input type="hidden" id="route_name" value="{{ route('user.reports.account-transactions') }}">
                        <table id="accountTransactionsTable" class="table table-bordered table-striped datatable-dynamic">
                            <thead>
                                <tr>
                                    <th>Transaction Type</th>
                                    <th>Ref. No.
                                    <th>Date &Time</th>
                                    <th>Amount</th>
                                    <th>Response Code</th>
                                    <!-- <th>AuthorisationID</th>
                                    <th>Classifier</th>
                                    <th>receivingInstitutionName</th>
                                    <th>Merchant</th>
                                    <th>TransactionTypeDescription</th>
                                    <th>SettlementConfirmationUUID</th>
                                    <th>TransactionTypeCode</th>
                                    <th>ResponseCodeClassifierCode</th>
                                    <th>ExtendedTransactionType</th>
                                    <th>UUID</th>
                                    <th>MessageType</th>
                                    <th>TransactionDate</th>
                                    <th>ExtendedTransactionTypeDescription</th>
                                    <th>ResponseCodeDescription</th>
                                    <th>ResponseCode</th>
                                    <th>TransactionDescription</th>
                                    <th>ResponseCodeClassifier</th>
                                    <th>MerchantID</th>
                                    <th>ProcessingDate</th>
                                    <th>CaptureDate</th>
                                    <th>MerchantGroup</th>
                                    <th>AccountType</th>
                                    <th>Compliant</th>
                                    <th>TransactionAmount</th>
                                    <th>receivingInstitutionIdCode</th>
                                    <th>SettlementConfirmations</th>
                                    <th>CardPresent</th>
                                    <th>RetrievalReferenceNumber</th>
                                    <th>AccountReference</th>
                                    <th>MerchantGroupID</th> -->
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