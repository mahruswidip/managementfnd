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
                                            <span class="text-xs">Product</span>
                                            <h6 class="mb-0"><?php echo $product['product']; ?></h6>
                                            <span class="text-xs">Material Code</span>
                                            <h6 class="mb-0"><?php echo $product['material_code']; ?></h6>
                                            <span class="text-xs">Material Description</span>
                                            <h6 class="mb-0"><?php echo $product['material_description'] ?></h6>
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
        <div class="col-12 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Pre Order Page</h6>
                        <a href="<?php echo site_url('preorder/add/'). $product['id_product']; ?>"
                            class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span>
                            Add +</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="dataTable-Preorder" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Preorder Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Supplier</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Product</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total PO QTY</th>
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
#dataTable-Preorder {
    height: 300px !important;
}

#dataTable-Preorder tbody tr:hover {
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
    $('#dataTable-Preorder').DataTable({
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 5,
        ajax: {
            url: '<?php echo base_url("preorder/view"); ?>',
            type: 'POST',
            dataSrc: ''
        },
        rowCallback: function(row, data) {
            // Attach click event listener to each row
            $(row).on('click', function() {
                // Get the ID of the clicked row's data
                var preorderId = data.id_preorder;

                // Redirect to the detail page using the preorderId
                window.location.href = '<?php echo site_url('preorder/detail/') ?>' +
                    preorderId;
            });
        },
        columns: [{
                data: 'po_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.po_number + '</p>';
                },
            },
            {
                data: 'supplier',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.supplier + '</p>';
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
                data: 'total_po_qty',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.total_po_qty +
                        '</p>';
                },
            },
            {
                data: null,
                className: 'td-column-right',
                render: function(data, type, row) {
                    if (<?php echo $this->session->userdata('user_level'); ?> == '1') {
                        var editButton =
                            '<a href="<?php echo site_url('preorder/edit/'); ?>' + row
                            .id_preorder +
                            '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil">Edit</span></a>';
                        var deleteButton =
                            '<a href="<?php echo site_url('preorder/remove/'); ?>' + row
                            .id_preorder +
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
        ] // Menyortir berdasarkan kolom dengan indeks 1 (kolom is_aktif) secara descending (nilai 1 akan berada di atas)
    });
});
</script>