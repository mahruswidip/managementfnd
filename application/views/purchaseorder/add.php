<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add Purchase Order</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'purchaseorder/add' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Select Supplier</label>
                                    <select id="supplier_id" class="form-control select2" name="supplier_id" required>
                                        <option value="">Select Supplier</option>
                                        <?php foreach($supplier as $supplier): ?>
                                        <option value="<?php echo $supplier['supplier_id']; ?>">
                                            <?php echo $supplier['supplier_name']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Purchase Order Number</label>
                                    <input type="text" class="form-control" name="po_number" value="" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Select Product</label>
                                    <select id="product_id" class="form-control select2" name="product_id" required>
                                        <option value="">Select Product</option>
                                        <?php foreach($product as $product): ?>
                                        <option value="<?php echo $product['product_id']; ?>">
                                            <?php echo $product['product']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">SAP Description</label>
                                    <input type="text" placeholder="CIDJW, CIDMD, etc" class="form-control"
                                        name="sap_description" value="" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity</label>
                                    <input type="text" placeholder="100000" class="form-control" name="quantity"
                                        value="" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Price / KG</label>
                                    <input type="text" placeholder="100000" class="form-control" name="price" value=""
                                        required><br>
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
    $('#supplier_id').select2({
        placeholder: 'Select a Supplier'
    });
    $('#product_id').select2({
        placeholder: 'Select a Product'
    });
});
</script>