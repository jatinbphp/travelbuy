$(function () {
    //Reports Table
    var account_table = $('#accountTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        lengthMenu: [ 50, 100, 150, 200, 250, ],
        ajax: $("#route_name").val(),
        columns: [
            {data: 'RowID', key: 'RowID'},
            /*{data: 'uniqueId', name: 'uniqueId'},*/
            /*{data: 'accountReference', key: 'accountReference'},*/
            {data: 'cardAcceptorIdCode', name: 'cardAcceptorIdCode'},
            {data: 'name', key: 'name'},
            /*{data: 'issuingProductCode', name: 'issuingProductCode'},*/
            {data: 'accountType', key: 'accountType'},
            {
              data: 'currentBalance',
              name: 'currentBalance',
              render: $.fn.dataTable.render.number( ' ', '.', 2, 'R ' )
            },
        ],
        "order": []
    });

    var account_transactions_table = $('#accountTransactionsTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        lengthMenu: [ 50, 100, 150, 200, 250, ],
        ajax: $("#route_name").val(),
        columns: [
            {data: 'TransactionTypeDescription', name: 'TransactionTypeDescription'},
            {data: 'RetrievalReferenceNumber', name: 'RetrievalReferenceNumber'},
            {data: 'TransactionDate', name: 'TransactionDate'},
            {
              data: 'TransactionAmount',
              name: 'TransactionAmount',
              render: $.fn.dataTable.render.number( ' ', '.', 2, 'R ' )
            },
            {data: 'ResponseCodeDescription', name: 'ResponseCodeDescription'},
            /*{data: 'AuthorisationID', key: 'AuthorisationID'},
            {data: 'Classifier', name: 'Classifier'},
            {data: 'receivingInstitutionName', name: 'receivingInstitutionName'},
            {data: 'Merchant', name: 'Merchant'},
            {data: 'TransactionTypeDescription', name: 'TransactionTypeDescription'},
            {data: 'SettlementConfirmationUUID', name: 'SettlementConfirmationUUID'},
            {data: 'TransactionTypeCode', name: 'TransactionTypeCode'},
            {data: 'ResponseCodeClassifierCode', name: 'ResponseCodeClassifierCode'},
            {data: 'ExtendedTransactionType', name: 'ExtendedTransactionType'},
            {data: 'UUID', name: 'UUID'},
            {data: 'MessageType', name: 'MessageType'},
            {data: 'TransactionDate', name: 'TransactionDate'},
            {data: 'ExtendedTransactionTypeDescription', name: 'ExtendedTransactionTypeDescription'},
            {data: 'ResponseCodeDescription', name: 'ResponseCodeDescription'},
            {data: 'ResponseCode', name: 'ResponseCode'},
            {data: 'TransactionDescription', name: 'TransactionDescription'},
            {data: 'ResponseCodeClassifier', name: 'ResponseCodeClassifier'},
            {data: 'MerchantID', name: 'MerchantID'},
            {data: 'ProcessingDate', name: 'ProcessingDate'},
            {data: 'CaptureDate', name: 'CaptureDate'},
            {data: 'MerchantGroup', name: 'MerchantGroup'},
            {data: 'AccountType', name: 'AccountType'},
            {data: 'Compliant', name: 'Compliant'},
            {data: 'TransactionAmount', name: 'TransactionAmount'},
            {data: 'receivingInstitutionIdCode', name: 'receivingInstitutionIdCode'},
            {data: 'SettlementConfirmations', name: 'SettlementConfirmations'},
            {data: 'CardPresent', name: 'CardPresent'},
            {data: 'RetrievalReferenceNumber', name: 'RetrievalReferenceNumber'},
            {data: 'AccountReference', name: 'AccountReference'},
            {data: 'MerchantGroupID', name: 'MerchantGroupID'},*/
        ],
        "order": []
    });

    var balance_table = $('#balanceTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        lengthMenu: [ 50, 100, 150, 200, 250, ],
        ajax: $("#route_name").val(),
        columns: [
            {data: 'RowID', "width": "15%", RowID: 'RowID'},
            {data: 'accountReference', name: 'accountReference'},
            {data: 'accountType', name: 'accountType'},
            {data: 'cardAcceptorIdCode', name: 'cardAcceptorIdCode'},
            {data: 'currentBalance', name: 'currentBalance'},
            {data: 'issuingProductCode', name: 'issuingProductCode'},
            {data: 'name', name: 'name'},
            {data: 'uniqueId', name: 'uniqueId'},
        ],
    });

    var terminals_online_table = $('#terminalsOnlineTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        lengthMenu: [ 50, 100, 150, 200, 250, ],
        ajax: $("#route_name").val(),
        columns: [
            {data: 'RowID', key: 'RowID'},
            /*{data: 'uniqueId', name: 'uniqueId'},*/
            {data: 'cardAcceptorId', key: 'cardAcceptorId'},
            {data: 'merchantName', name: 'merchantName'},
            {data: 'cardAcceptorTerminalId', key: 'cardAcceptorTerminalId'},
            {data: 'terminalName', name: 'terminalName'},
            /*{data: 'statusCode', key: 'statusCode'},*/
            {data: 'statusName', name: 'statusName'},
            /*{data: 'terminalOwnerId', key: 'terminalOwnerId'},
            {data: 'terminalOwnerName', name: 'terminalOwnerName'},
            {data: 'receivingCardAcceptorIdCode1', key: 'receivingCardAcceptorIdCode1'},*/
            {data: 'deviceVendorName', name: 'deviceVendorName'},
            {data: 'deviceModelName', name: 'deviceModelName'},
        ],
    });

    var terminals_transactions_table = $('#terminalsTransactionsTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 50,
        lengthMenu: [ 50, 100, 150, 200, 250, ],
        ajax: $("#route_name").val(),
        columns: [
            {data: 'transactionTypeDescription', key: 'transactionTypeDescription'},
            {data: 'retrievalReferenceNumber', key: 'retrievalReferenceNumber'},
            {data: 'transactionDate', key: 'transactionDate'},
            {
              data: 'transactionAmount',
              name: 'transactionAmount',
              render: $.fn.dataTable.render.number( ' ', '.', 2, 'R ' )
            },
            {
                data: 'PAN',
                name: 'PAN',
                render: function(data, type, row) {
                    return data ? data : ''; // or any default value you prefer
                }
            },
            {
              data: 'reconciliationStatus',
              key: 'reconciliationStatus',
              render: function(data, type, row) {
                switch (data) {
                  case 'Pending':
                    return '<span class="badge badge-warning">Pending</span>';
                  case 'N/A':
                    return '<span class="badge badge-secondary">N/A</span>';
                  case 'Reconciled':
                    return '<span class="badge badge-success">Reconciled</span>';
                  default:
                    return data;
                }
              }
            }
            /*{data: 'RowID', key: 'RowID'},
            {data: 'uniqueId', name: 'uniqueId'},
            {data: 'receiptLogId', key: 'receiptLogId'},
            {data: 'cardAcceptorId', name: 'cardAcceptorId'},
            {data: 'name', key: 'name'},
            {data: 'headCardAcceptorId', name: 'headCardAcceptorId'},
            {data: 'headCardAcceptorName', key: 'headCardAcceptorName'},
            {data: 'transactionDate', name: 'transactionDate'},
            {data: 'processingDate', key: 'processingDate'},
            {data: 'captureDate', name: 'captureDate'},
            {data: 'transactionAmount', name: 'transactionAmount'},
            {data: 'tipAmount', key: 'tipAmount'},
            {data: 'cashbackAmount', name: 'cashbackAmount'},
            {data: 'responseCodeClassifierCode', key: 'responseCodeClassifierCode'},
            {data: 'responseCodeClassifier', name: 'responseCodeClassifier'},
            {data: 'responseCode', name: 'responseCode'},
            {data: 'responseCodeDescription', name: 'responseCodeDescription'},
            {data: 'transactionTypeDescription', name: 'transactionTypeDescription'},
            {data: 'terminalId', name: 'terminalId'},
            {data: 'retrievalReferenceNumber', name: 'retrievalReferenceNumber'},
            {data: 'transactionUUID', name: 'transactionUUID'},
            {
                data: 'authId',
                name: 'authId',
                render: function(data, type, row) {
                    return data ? data : ''; // or any default value you prefer
                }
            },
            {
                data: 'receivingInstitutionIdCode',
                name: 'receivingInstitutionIdCode',
                render: function(data, type, row) {
                    return data ? data : ''; // or any default value you prefer
                }
            },
            {data: 'receivingInstitutionName', name: 'receivingInstitutionName'},
            {data: 'acquirerId', name: 'acquirerId'},
            {data: 'acquirerName', name: 'acquirerName'},
            {data: 'reconciliationStatus', name: 'reconciliationStatus'},
            {data: 'multiTenderTransaction', name: 'multiTenderTransaction'},
            {data: 'backOfficeProcessingStatus', name: 'backOfficeProcessingStatus'},
            {data: 'compliant', name: 'compliant'},*/
        ],
    });

    var products_table = $('#productsTable').DataTable({
        processing: true,
        serverSide: true, 
        pageLength: 50,
        lengthMenu: [ 50, 100, 150, 200, 250, ],
        ajax: $("#route_name").val(),
        columns: [
            {data: 'name', name: 'name'},
            {data: 'price', name: 'price'},
            {data: 'status',  name: 'status', orderable: false},  
            {data: 'created_at', name: 'created_at'},  
            {data: 'action', orderable: false},  
        ],
    });
    
    var sectionTableMap = {
        'products_table': products_table
    };

    //Delete Record
    $('.datatable-dynamic tbody').on('click', '.deleteRecord', function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        var section = $(this).attr("data-section");

        swal({
            title: "Are you sure?",
            text: "You want to delete this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: "DELETE",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                    success: function(response) {
                        if (section === 'products_table') {
                            if (response.status === 'success') {
                                var table = sectionTableMap[section];
                                console.log(table);
        
                                if (table) {
                                    table.row('.selected').remove().draw(false);
                                }
        
                                swal("Deleted", "Your data successfully deleted!", "success");
                            } else if (response.status === 'error') {
                                swal("Error", response.message, "error");
                            }
                        }
                    },
                });
            } else {
                swal("Cancelled", "Your data safe!", "error");
            }
        });
    });

    //Change Status
    $('.datatable-dynamic tbody').on('click', '.assign_unassign', function (event) {
        event.preventDefault();
        var url = $(this).attr('data-url');
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var table_name = $(this).attr("data-table_name");
        var section = $(this).attr("data-table_name");

        var l = Ladda.create(this);
        l.start();
        $.ajax({
            url: url,
            type: "post",
            data: {
                'id': id,
                'type': type,
                'table_name': table_name,
            },
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
            success: function(data){
                l.stop();

                if(type=='unassign'){
                    $('#assign_remove_'+id).hide();
                    $('#assign_add_'+id).show();
                } else {
                    $('#assign_remove_'+id).show();
                    $('#assign_add_'+id).hide();
                }

                if(section=='users_table'){
                    users_table.draw(false);
                } else if(section=='products_table'){
                    products_table.draw(false);
                } else if(section=='products_table'){
                    products_table.draw(false);
                } else if(section=='options_table'){
                    options_table.draw(false);
                }
            }
        });
    });

    /* PRODUCT ADD TO CART  */
    $(document).on("click", ".add-to-cart-button", function(event){
        event.preventDefault();
        var productId = $(this).data('product-id');
        var qty = $("#productQty_"+productId).val();
      
        $.ajax({
            type: 'POST',
            url: 'add-to-cart',
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
            data:{
                'product_id':productId,
                'qty':qty
            },            
            success: function(response) {
                swal("Added", "Product has been added to the cart successfully!", "success");
            },
        });
    });
});