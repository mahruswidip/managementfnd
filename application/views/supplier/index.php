<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Suppliers Page</h6>
                        <a href="<?php echo site_url('supplier/add'); ?>"
                            class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span>
                            Add +</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="dataTable-Suppliers" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Supplier Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact Info</th>

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
#dataTable-Suppliers {
    height: 300px !important;
}

#dataTable-Suppliers tbody tr:hover {
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
    $('#dataTable-Suppliers').DataTable({
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 5,
        ajax: {
            url: '<?php echo base_url("supplier/view"); ?>',
            type: 'POST',
            dataSrc: ''
        },
        rowCallback: function(row, data) {
            // Attach click event listener to each row
            $(row).on('click', function() {
                // Get the ID of the clicked row's data
                var productId = data.id_product;

                // Redirect to the detail page using the productId
                window.location.href = '<?php echo site_url('supplier/detail/') ?>' +
                    productId;
            });
        },
        columns: [{
                data: 'supplier_name',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.supplier_name +
                        '</p>';
                },
            },
            {
                data: 'contact_info',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.contact_info +
                        '</p>';
                },
            },
            {
                data: null,
                className: 'td-column-right',
                render: function(data, type, row) {
                    if (<?php echo $this->session->userdata('user_level'); ?> == '1') {
                        var editButton =
                            '<a href="<?php echo site_url('product/edit/'); ?>' + row
                            .supplier_id +
                            '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil">Edit</span></a>';
                        var deleteButton =
                            '<a href="<?php echo site_url('product/remove/'); ?>' + row
                            .supplier_id +
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