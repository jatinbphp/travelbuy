@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    @include('admin.common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => route('user.dashboard'), 'title' => 'Dashboard'],
            ['route' => route('user.reports.terminal-transactions'), 'title' => 'Reports']
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
                        <input type="hidden" id="route_name" value="{{ route('user.reports.terminal-transactions') }}">
                        <table id="terminalsTransactionsTable" class="table table-bordered table-striped datatable-dynamic">
                            <thead>
                                <tr>
                                    <!-- <th>RowID</th>
                                    <th>uniqueId</th>
                                    <th>receiptLogId</th>
                                    <th>cardAcceptorId</th>
                                    <th>name</th>
                                    <th>headCardAcceptorId</th> 
                                    <th>headCardAcceptorName</th> 
                                    <th>transactionDate</th>
                                    <th>processingDate</th>
                                    <th>captureDate</th>
                                    <th>transactionAmount</th>
                                    <th>tipAmount</th>
                                    <th>cashbackAmount</th>
                                    <th>responseCodeClassifierCode</th>
                                    <th>responseCodeClassifier</th>
                                    <th>responseCode</th>
                                    <th>responseCodeDescription</th>
                                    <th>transactionTypeDescription</th>
                                    <th>terminalId</th>
                                    <th>retrievalReferenceNumber</th>
                                    <th>transactionUUID</th>
                                    <th>authId</th>
                                    <th>receivingInstitutionIdCode</th>
                                    <th>receivingInstitutionName</th>
                                    <th>acquirerId</th>
                                    <th>acquirerName</th>
                                    <th>reconciliationStatus</th>
                                    <th>multiTenderTransaction</th>
                                    <th>backOfficeProcessingStatus</th> 
                                    <th>compliant</th> -->
                                    <th>Transaction Type</th>
                                    <th>Retrieval Reference</th>
                                    <th>Date & Time</th>
                                    <th>Amount</th>
                                    <th>PAN</th>
                                    <th>Status</th> 
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