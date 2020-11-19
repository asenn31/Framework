<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Tambah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/cs/tambahTransaksi" method="post">
                    <div class="form-group">     
                      <label for="kode_penyewa">Kode Penyewa</label>
                      <input type="text" class="form-control <?php echo (!empty($data['kode_penyewa_err'])) ? 'is-invalid' : ''; ?>" name="kode_penyewa" id="kode_penyewa" value="<?php echo $data['kode_penyewa']; ?>">
                      <span class="invalid-feedback"><?php echo $data['kode_penyewa_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="kode_fasilitas">Kode Fasilitas Kamar</label>
                      <input type="text" class="form-control <?php echo (!empty($data['kode_fasilitaskamar_err'])) ? 'is-invalid' : ''; ?>" name="kode_fasilitaskamar" id="kode_fasilitaskamar" value="<?php echo $data['kode_fasilitaskamar']; ?>">
                      <span class="invalid-feedback"><?php echo $data['kode_fasilitaskamar_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_masuk">Tanggal Masuk</label>
                      <input type="date" class="form-control <?php echo (!empty($data['tanggal_masuk_err'])) ? 'is-invalid' : ''; ?>" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo $data['tanggal_masuk']; ?>">
                      <span class="invalid-feedback"><?php echo $data['tanggal_masuk_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="tanggal_keluar">Tanggal Keluar</label>
                      <input type="date" class="form-control <?php echo (!empty($data['tanggal_keluar_err'])) ? 'is-invalid' : ''; ?>" name="tanggal_keluar" id="tanggal_keluar" value="<?php echo $data['tanggal_keluar']; ?>">
                      <span class="invalid-feedback"><?php echo $data['tanggal_keluar_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
