<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Artikel</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'artikel/add' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Judul Artikel</label>
                                    <input type="text" class="form-control" name="judul_artikel" value="<?php echo $this->input->post('judul_artikel'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Travel</label>
                                    <select name="travel" class="form-control">
                                        <option value="">Pilih Travel</option>
                                        <?php
                                        $travel_values = array(
                                            'Rosana Travel' => 'Rosana Travel',
                                            'Nipindo Travel' => 'Nipindo Travel',
                                        );

                                        foreach ($travel_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('travel')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Konten</label>
                                    <input type="text" class="form-control" name="konten" value="<?php echo $this->input->post('konten'); ?>" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Foto Konten</label>
                                    <br>
                                    <input type="file" class="form-control" name="artikel_img" required>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>