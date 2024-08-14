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
                                        <div class="col-md-6">
                                            <!-- <?php echo '<pre>';print_r($invoice)  ?> -->
                                            <span class="text-xs">Invoice Number</span>
                                            <h6 class="mb-0"><?php echo $invoice['invoice_number']; ?></h6>
                                            <span class="text-xs">Product</span>
                                            <h6 class="mb-0"><?php echo $invoice['product'] ?></h6>
                                            <span class="text-xs">Supplier</span>
                                            <h6 class="mb-0"><?php echo $invoice['supplier_name'] ?></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- <?php echo '<pre>';print_r($invoice)  ?> -->
                                            <span class="text-xs">Receipt Doc</span>
                                            <h6 class="mb-0">
                                                <?php echo $tanggalConverted = date_format(date_create($invoice['receipt_doc']), 'd F Y'); ?>
                                            </h6>
                                            <span class="text-xs">Complete Document</span>
                                            <h6 class="mb-0">
                                                <?php echo $tanggalConverted = date_format(date_create($invoice['complete_doc']), 'd F Y'); ?>
                                            </h6>
                                            <span class="text-xs">Request Payment Date</span>
                                            <h6 class="mb-0">
                                                <?php echo $tanggalConverted = date_format(date_create($invoice['req_payment_date']), 'd F Y'); ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">
                                            <a href="<?php echo site_url('invoice/checklist/'.$invoice['invoice_id']); ?>"
                                                class="btn bg-gradient-primary btn-sm ms-auto"><span
                                                    class="fa fa-plus">&nbsp</span>
                                                Open Checklist &nbsp ></a>
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
                        <h6>Add Shipment</h6>
                        <a href="#" class="btn bg-gradient-primary btn-sm ms-auto" data-toggle="modal"
                            data-target="#shipmentModal">
                            <span class="fa fa-plus me-2"></span> Add +
                        </a>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="table-responsive p-4">
                        <table id="dataTable-Shipment" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Shipment Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Vehicle Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Collie</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Netto</th>
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
<!-- Modal -->
<div class="modal fade" id="shipmentModal" tabindex="-1" role="dialog" aria-labelledby="shipmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shipmentModalLabel">Add/Edit Shipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="shipmentForm">
                    <input type="hidden" name="shipment_id" id="shipment_id">
                    <input type="hidden" name="invoice_id" id="invoice_id"
                        value="<?php echo $invoice['invoice_id']; ?>">

                    <div class="form-group">
                        <label for="shipment_number">Shipment Number</label>
                        <input type="text" class="form-control" id="shipment_number" name="shipment_number" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle_number">Vehicle Number</label>
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
                    </div>
                    <div class="form-group">
                        <label for="collie">Collie</label>
                        <input type="number" class="form-control" id="collie" name="collie" required>
                    </div>
                    <div class="form-group">
                        <label for="netto">Netto</label>
                        <input type="number" class="form-control" id="netto" name="netto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
#dataTable-Shipment {
    height: 150px !important;
}
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
$(document).ready(function() {
    // Initialize DataTable and save reference to it
    var table = $('#dataTable-Shipment').DataTable({
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">"
            },
        },
        "pageLength": 10,
        ajax: {
            url: '<?php echo base_url("invoice/view_shipment_by_invoice"); ?>',
            type: 'POST',
            data: {
                invoice_id: '<?php echo $invoice["invoice_id"]; ?>' // Pastikan ini mengirimkan ID yang benar
            },
            dataSrc: ''
        },
        columns: [{
                data: 'shipment_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.shipment_number +
                        '</p>';
                },
            },
            {
                data: 'vehicle_number',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.vehicle_number +
                        '</p>';
                },
            },
            {
                data: 'collie',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.collie + '</p>';
                },
            },
            {
                data: 'netto',
                render: function(data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.netto + '</p>';
                },
            },
            {
                data: null,
                className: 'td-column-right',
                render: function(data, type, row) {
                    if (<?php echo $this->session->userdata('user_level'); ?> == '1') {
                        var editButton =
                            '<a href="<?php echo site_url('invoice/edit/'); ?>' + row
                            .shipment_id +
                            '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil">Edit</span></a>';
                        var deleteButton =
                            '<a href="<?php echo site_url('invoice/remove/'); ?>' + row
                            .shipment_id +
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

    // Open Modal for Add/Edit
    $('#shipmentModal').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget); // Button that triggered the modal
        var shipment_id = button.data('shipment_id'); // Extract info from data-* attributes

        if (shipment_id) {
            // Edit existing shipment
            $.ajax({
                url: '<?php echo base_url("invoice/get_shipment_by_id/"); ?>' + shipment_id,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#shipment_id').val(data.shipment_id);
                    $('#shipment_number').val(data.shipment_number);
                    $('#vehicle_number').val(data.vehicle_number);
                    $('#collie').val(data.collie);
                    $('#netto').val(data.netto);
                    $('#total_shipment_amount').val(data.total_shipment_amount);
                    $('#shipmentModalLabel').text('Edit Shipment');
                }
            });
        } else {
            // Add new shipment
            $('#shipmentForm')[0].reset();
            $('#shipment_id').val('');
            $('#shipmentModalLabel').text('Add Shipment');
        }
    });

    // Handle form submission via AJAX
    $('#shipmentForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: '<?php echo base_url("invoice/add_shipment"); ?>',
            method: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                $('#shipmentModal').modal('hide');
                table.ajax.reload(); // Reload the DataTable
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('AJAX Error:', status, error);
            }
        });
    });
});
</script>