<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Invoice Page</h6>
                        <a href="<?php echo site_url('invoice/add'); ?>"
                            class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span>
                            Add +</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="dataTable-Invoice" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Invoice Number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Purchase Order Number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product ID</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Recipt</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Complete Doc</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Request Payment</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Due Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
#dataTable-Invoice tbody tr:hover {
    background-color: #f5f5f5;
    /* Change the background color to your desired hover color */
    cursor: pointer;
    /* Change the cursor to a pointer on hover */
}
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTable-Invoice').DataTable({
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 5,
        ajax: {
            url: '<?php echo base_url("invoice/view"); ?>',
            type: 'POST',
            dataSrc: ''
        },
        rowCallback: function(row, data) {
            // Attach click event listener to each row
            $(row).on('click', function() {
                // Get the ID of the clicked row's data
                var invoice_id = data.invoice_id;

                // Redirect to the detail page using the invoice_id
                window.location.href = '<?php echo site_url('invoice/detail/') ?>' +
                    invoice_id;
            });
        },
        columns: [{
                data: 'invoice_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.invoice_number +
                        '</p>';
                },
            },
            {
                data: 'po_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.po_number +
                        '</p>';
                },
            },
            {
                data: 'product',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.product +
                        '</p>';
                },
            },
            {
                data: 'receipt_doc',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.receipt_doc +
                        '</p>';
                },
            },
            {
                data: 'complete_doc',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.complete_doc +
                        '</p>';
                },
            },
            {
                data: 'req_payment_date',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row
                        .req_payment_date +
                        '</p>';
                },
            },
            {
                data: 'due_date',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.due_date + '</p>';
                },
            },
            {
                data: null,
                className: 'td-column-right',
                render: function(data, type, row) {
                    if (<?php echo $this->session->userdata('user_level'); ?> == '1') {
                        var editButton =
                            '<a href="<?php echo site_url('invoice/edit/'); ?>' + row
                            .invoice_id +
                            '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil">Edit</span></a>';
                        var deleteButton =
                            '<a href="<?php echo site_url('invoice/remove/'); ?>' + row
                            .invoice_id +
                            '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash">Delete</span></a>';
                        return editButton + ' ' + deleteButton;
                    } else {
                        return '';
                    }
                }
            },
        ],
        "order": [
            [1, 'asc']
        ]
    });
});
</script>