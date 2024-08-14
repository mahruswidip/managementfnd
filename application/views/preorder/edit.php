<!-- Edit Artikel -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Artikel</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'artikel/edit/' . $artikel['id_artikel']; ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Judul Artikel</label>
                                    <input type="text" class="form-control" name="judul_artikel" value="<?php echo $artikel['judul_artikel']; ?>" required>
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
                                            $selected = ($value == $artikel['travel']) ? ' selected="selected"' : "";
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori Artikel</label>
                                    <input type="text" class="form-control" name="kategori" value="<?php echo $artikel['kategori']; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Konten</label>
                                    <textarea id="editor" name="konten" required><?php echo $artikel['konten']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Foto Konten</label>
                                    <br>
                                    <input type="file" class="form-control" name="artikel_img">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>