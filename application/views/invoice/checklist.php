<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pt-0 p-3 mt-3 mx-2">
                    <div class="row">
                        <div class="col-12">
                            <h4>CHECKLIST PROPOSAL PAYMENT</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">SUPPLIER</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">: <?php echo $invoice['supplier_name']  ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">INVOICE </h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">: <?php echo $invoice['invoice_number'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">PRODUCT </h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">: <?php echo $invoice['product']  ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">TOTAL PO QTY </h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                        <?php echo number_format($total_po_qty, 0, ',', '.');; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">GTC</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">PC NO.</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">RECEIPT DOC.</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                        <?php echo $tanggalConverted = date_format(date_create($invoice['receipt_doc']), 'd F Y'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">COMPLETE DOC.</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                        <?php echo $tanggalConverted = date_format(date_create($invoice['complete_doc']), 'd F Y'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">REQ. PAYMENT</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                        <?php echo $tanggalConverted = date_format(date_create($invoice['req_payment_date']), 'd F Y'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">DUE DATE</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                        <?php echo $tanggalConverted = date_format(date_create($invoice['due_date']), 'd F Y'); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">SAP MATERIAL</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">: <?php echo $invoice['material_code']  ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6 class="mb-0">SAP DESC.</h6>
                                </div>
                                <div class="col">
                                    <p style="font-weight:800;" class="mb-0">:
                                        <?php echo $invoice['material_description']  ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <?php print_r($invoice)?> -->
                    <hr>
                    <?php
                    // Initialize subtotal variables
                    $subtotal_collie = 0;
                    $subtotal_netto = 0;
                    $subtotal_total_amount = 0;

                    // Calculate subtotals for the first table
                    foreach ($shipment as $row) {
                        $subtotal_collie += $row['collie'];
                        $subtotal_netto += $row['netto'];
                        $subtotal_total_amount += $row['price'] * $row['netto'];
                    }

                    // Initialize grand total variables
                    $grand_total_collie = 0;
                    $grand_total_netto = 0;
                    $grand_total_amount = 0;

                    // Calculate grand totals for the second table
                    foreach ($other_shipments as $row) {
                        $grand_total_collie += $row['collie'];
                        $grand_total_netto += $row['netto'];
                        $grand_total_amount += isset($row['price']) ? $row['price'] * $row['netto'] : 0;
                    }

                    // Calculate final grand total
                    $final_grand_total_collie = $subtotal_collie + $grand_total_collie;
                    $final_grand_total_netto = $subtotal_netto + $grand_total_netto;
                    $final_grand_total_amount = $subtotal_total_amount + $grand_total_amount;
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Shipment Number</th>
                                            <th scope="col">Vehicle Number</th>
                                            <th scope="col">Invoice Number</th>
                                            <th scope="col">Collie</th>
                                            <th scope="col">Netto</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($shipment as $row): ?>
                                        <tr>
                                            <td><?php echo $row['shipment_number']; ?></td>
                                            <td><?php echo $row['vehicle_number']; ?></td>
                                            <td><?php echo $invoice['invoice_number']; ?></td>
                                            <td><?php echo $row['collie']; ?></td>
                                            <td><?php echo number_format($row['netto'], 0, ',', '.'); ?></td>
                                            <td><?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                                            <td><?php echo number_format($row['price'] * $row['netto'], 0, ',', '.'); ?>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">Subtotal</th>
                                            <th><?php echo number_format($subtotal_collie, 0, ',', '.'); ?></th>
                                            <th><?php echo number_format($subtotal_netto, 0, ',', '.'); ?></th>
                                            <th></th>
                                            <th><?php echo number_format($subtotal_total_amount, 0, ',', '.'); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Shipment Number</th>
                                            <th scope="col">Vehicle Number</th>
                                            <th scope="col">Invoice Number</th>
                                            <th scope="col">Collie</th>
                                            <th scope="col">Netto</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($other_shipments as $row): ?>
                                        <tr>
                                            <td><?php echo $row['shipment_number']; ?></td>
                                            <td><?php echo $row['vehicle_number']; ?></td>
                                            <td><?php echo $row['invoice_number']; ?></td>
                                            <td><?php echo $row['collie']; ?></td>
                                            <td><?php echo number_format($row['netto'], 0, ',', '.'); ?></td>
                                            <td><?php echo isset($row['price']) ? number_format($row['price'], 0, ',', '.') : '-'; ?>
                                            </td>
                                            <td><?php echo isset($row['price']) ? number_format($row['price'] * $row['netto'], 0, ',', '.') : '-'; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <th colspan="3" class="text-right">Grand Total</th>
                                            <th><?php echo number_format($final_grand_total_collie, 0, ',', '.'); ?>
                                            </th>
                                            <th><?php echo number_format($final_grand_total_netto, 0, ',', '.'); ?></th>
                                            <th></th>
                                            <th><?php echo number_format($final_grand_total_amount, 0, ',', '.'); ?>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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