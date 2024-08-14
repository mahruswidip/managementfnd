<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="row" id="infojamaah">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body pt-0 p-3 mt-3 mx-2">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="text-xs">Pre Order Number</span>
                                            <h6 class="mb-0"><?php echo $preorder['po_number']; ?></h6>
                                            <span class="text-xs">Supplier</span>
                                            <h6 class="mb-0"><?php echo $preorder['supplier']; ?></h6>
                                            <span class="text-xs">Product</span>
                                            <h6 class="mb-0"><?php echo $preorder['product'] ?></h6>
                                            <span class="text-xs">Total PO Quantity</span>
                                            <h6 class="mb-0"><?php echo $preorder['total_po_qty'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Add Invoice</h6>
                        <a href="<?php echo site_url('invoice/add_invoice/') . $preorder['id_preorder']; ?>"
                            class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus me-2"></span> Add
                            +</a>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="table-responsive p-4">
                        <table id="dataTable-Invoice" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Invoice Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pre Order Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product</th>
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
#dataTable-Invoice {
    height: 300px !important;
}
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
$(document).ready(function() {
    var poNumber = '111000111'; // Dapatkan po_number dari PHP

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
            data: {
                po_number: poNumber // Kirim po_number sebagai parameter
            },
            dataSrc: ''
        },
        columns: [{
                data: 'status',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.status + '</p>';
                },
            },
            {
                data: 'invoice_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.invoice_number +
                        '</p>';
                },
            },
            {
                data: 'fk_id_po_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.fk_id_po_number +
                        '</p>';
                },
            },
            {
                data: 'fk_id_product',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.fk_id_product +
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
                data: 'request_payment',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.request_payment +
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
                            .id_invoice +
                            '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil">Edit</span></a>';
                        var deleteButton =
                            '<a href="<?php echo site_url('invoice/remove/'); ?>' + row
                            .id_invoice +
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
<script>
// function printToJpg(rowId) {
//     // Use html2canvas to convert the specified row to an image
//     html2canvas(document.getElementById(rowId), {
//         scale: 4
//     }).then(canvas => {
//         // Create an anchor tag to trigger the download
//         var anchorTag = document.createElement("a");
//         document.body.appendChild(anchorTag);

//         // Set the download attributes with improved quality
//         anchorTag.download = "infojamaah_image.jpg";
//         anchorTag.href = canvas.toDataURL('image/jpeg', 1.0); // Set quality to 1.0 for maximum quality

//         // Trigger the download
//         anchorTag.click();

//         // Remove the temporary anchor tag
//         document.body.removeChild(anchorTag);
//     });
// }
</script>