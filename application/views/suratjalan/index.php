<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Surat Jalan Page</h6>
                        <a href="<?php echo site_url('suratjalan/add'); ?>"
                            class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span>
                            Add +</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="dataTableSuratjalan" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Invoice Number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Surat Jalan Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Collie</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Netto</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Amount</th>
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
#dataTableSuratjalan {
    height: 300px !important;
}
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTableSuratjalan').DataTable({
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 5,
        ajax: {
            url: '<?php echo base_url("suratjalan/view"); ?>',
            type: 'POST',
            dataSrc: ''
        },
        columns: [{
                data: 'fk_id_invoice',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.fk_id_invoice +
                        '</p>';
                },
            },
            {
                data: 'suratjalan_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.suratjalan_number +
                        '</p>';
                },
            },
            {
                data: 'collie',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.collie +
                        '</p>';
                },
            },
            {
                data: 'netto',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.netto +
                        '</p>';
                },
            },
            {
                data: 'price',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.price +
                        '</p>';
                },
            },
            {
                data: 'amount',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row
                        .amount +
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