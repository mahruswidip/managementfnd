<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add Surat Jalan</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'suratjalan/add' ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Select Invoice Number</label>
                                    <input type="text" class="form-control" name="fk_id_invoice"
                                        value="<?php echo $this->input->post('fk_id_invoice'); ?>" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Surat Jalan Number</label>
                                    <input type="text" class="form-control" name="suratjalan_number"
                                        value="<?php echo $this->input->post('suratjalan_number'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Collie</label>
                                    <input type="text" class="form-control" name="collie"
                                        value="<?php echo $this->input->post('collie'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Netto</label>
                                    <input type="text" class="form-control" name="netto"
                                        value="<?php echo $this->input->post('netto'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Price / KG</label>
                                    <input type="text" class="form-control" name="price"
                                        value="<?php echo $this->input->post('price'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Amount</label>
                                    <input type="text" class="form-control" name="amount"
                                        value="<?php echo $this->input->post('amount'); ?>" required><br>
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