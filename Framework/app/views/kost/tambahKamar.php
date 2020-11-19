<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Tambah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/kost/tambahKamar" method="post">
                    <div class="form-group">
                      <label for="kode_kamar">Kode Kamar</label>
                      <input type="text" class="form-control <?php echo (!empty($data['kode_kamar_err'])) ? 'is-invalid' : ''; ?>" name="kode_kamar" id="kode_kamar" value="<?php echo $data['kode_kamar']; ?>">
                      <span class="invalid-feedback"><?php echo $data['kode_kamar_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="luas_kamar">Luas Kamar</label>
                      <input type="text" class="form-control <?php echo (!empty($data['luas_kamar_err'])) ? 'is-invalid' : ''; ?>" name="luas_kamar" id="luas_kamar" value="<?php echo $data['luas_kamar']; ?>">
                      <span class="invalid-feedback"><?php echo $data['luas_kamar_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="harga_kamar">Harga Kamar</label>
                      <input type="text" class="form-control <?php echo (!empty($data['harga_kamar_err'])) ? 'is-invalid' : ''; ?>" name="harga_kamar" id="harga_kamar" value="<?php echo $data['harga_kamar']; ?>">
                      <span class="invalid-feedback"><?php echo $data['harga_kamar_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control <?php echo (!empty($data['keterangan_err'])) ? 'is-invalid' : ''; ?>" name="keterangan" id="keterangan" value="<?php echo $data['keterangan']; ?>">
                      <span class="invalid-feedback"><?php echo $data['keterangan_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
                </form>
            </div>
 
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
