<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add Preorder</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'preorder/add' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Pre Order Number</label>
                                    <input type="text" class="form-control" name="po_number"
                                        value="<?php echo $this->input->post('po_number'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Supplier</label>
                                    <input type="text" class="form-control" name="supplier"
                                        value="<?php echo $this->input->post('supplier'); ?>" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Select Product</label>
                                    <select id="fk_id_product" class="form-control select2" name="fk_id_product"
                                        required>
                                        <option value="">Select Product</option>
                                        <?php foreach($products as $product): ?>
                                        <option value="<?php echo $product['id_product']; ?>">
                                            <?php echo $product['product']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="product-details">
                            <p id="material_code"></p>
                            <p id="material_description"></p>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Total Pre Order Quantity</label>
                                <input type="text" class="form-control" name="total_po_qty"
                                    value="<?php echo $this->input->post('total_po_qty'); ?>" required><br>
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
    $('#fk_id_product').select2({
        placeholder: 'Select a Product'
    });

    $('#fk_id_product').on('change', function() {
        var productId = $(this).val();

        if (productId) {
            $.ajax({
                url: '<?php echo site_url('product/get_product_details/'); ?>' + productId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        $('#material_code').text('Material Code: ' + response
                        .material_code);
                        $('#material_description').text('Material Description: ' + response
                            .material_description);
                    } else {
                        $('#material_code').text('Material Code: ');
                        $('#material_description').text('Material Description: ');
                    }
                },
                error: function() {
                    $('#material_code').text('Material Code: Error fetching details');
                    $('#material_description').text(
                        'Material Description: Error fetching details');
                }
            });
        } else {
            $('#material_code').text('Material Code: ');
            $('#material_description').text('Material Description: ');
        }
    });
});
</script>