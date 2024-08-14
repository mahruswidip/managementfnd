<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add Invoice</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'invoice/add' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Select Purchase Order</label>
                                    <select id="po_id" class="form-control select2" name="po_id" required>
                                        <option value="">Select Purchase Order</option>
                                        <?php foreach($purchaseorder as $po): ?>
                                        <option value="<?php echo $po['po_id']; ?>">
                                            <?php echo $po['po_number'] . ' - ' . $po['product']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Invoice Number</label>
                                    <input type="text" class="form-control" name="invoice_number"
                                        value="<?php echo $this->input->post('invoice_number'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Receipt Document</label>
                                    <input type="date" class="form-control" name="receipt_doc"
                                        value="<?php echo $this->input->post('receipt_doc'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Complete Doc</label>
                                    <input type="date" class="form-control" name="complete_doc"
                                        value="<?php echo $this->input->post('complete_doc'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Request Payment</label>
                                    <input type="date" class="form-control" name="req_payment_date"
                                        value="<?php echo $this->input->post('req_payment_date'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Due Date</label>
                                    <input type="date" class="form-control" name="due_date"
                                        value="<?php echo $this->input->post('due_date'); ?>" required><br>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#po_id').select2({
        placeholder: 'Select a Purchase Order'
    });
});
</script>