<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add Product</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'product/add' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name</label>
                                    <input type="text" class="form-control" name="product"
                                        value="<?php echo $this->input->post('judul_artikel'); ?>" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Material Code</label>
                                    <input type="text" class="form-control" name="material_code"
                                        value="<?php echo $this->input->post('kategori'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Material Description</label>
                                    <input type="text" class="form-control" name="material_description"
                                        value="<?php echo $this->input->post('material_description'); ?>" required><br>
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
<script src="<?php echo base_url('assets'); ?>/js/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
});
</script>