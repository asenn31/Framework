<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Tambah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/cs/tambahTransaksiLain" method="post">
                    <div class="form-group">     
                      <label for="kode_penyewa">Kode Penyewa</label>
                      <input type="text" class="form-control <?php echo (!empty($data['kode_penyewa_err'])) ? 'is-invalid' : ''; ?>" name="kode_penyewa" id="kode_penyewa" value="<?php echo $data['kode_penyewa']; ?>">
                      <span class="invalid-feedback"><?php echo $data['kode_penyewa_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="date" class="form-control <?php echo (!empty($data['tanggal_err'])) ? 'is-invalid' : ''; ?>" name="tanggal" id="tanggal" value="<?php echo $data['tanggal']; ?>">
                      <span class="invalid-feedback"><?php echo $data['tanggal_err'] ?></span>
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
