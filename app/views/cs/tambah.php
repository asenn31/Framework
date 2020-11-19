<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Tambah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/cs/tambah" method="post">
                    <div class="form-group">
                      <label for="kode_penyewa">Kode Penyewa</label>
                      <input type="text" class="form-control <?php echo (!empty($data['kode_penyewa_err'])) ? 'is-invalid' : ''; ?>" name="kode_penyewa" id="kode_penyewa" value="<?php echo $data['kode_penyewa']; ?>">
                      <span class="invalid-feedback"><?php echo $data['kode_penyewa_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="nama_penyewa">Nama Penyewa</label>
                      <input type="text" class="form-control <?php echo (!empty($data['nama_penyewa_err'])) ? 'is-invalid' : ''; ?>" name="nama_penyewa" id="nama_penyewa" value="<?php echo $data['nama_penyewa']; ?>">
                      <span class="invalid-feedback"><?php echo $data['nama_penyewa_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <input type="text" class="form-control <?php echo (!empty($data['jenis_kelamin_err'])) ? 'is-invalid' : ''; ?>" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>">
                      <span class="invalid-feedback"><?php echo $data['jenis_kelamin_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <input type="text" class="form-control <?php echo (!empty($data['status_err'])) ? 'is-invalid' : ''; ?>" name="status" id="status" value="<?php echo $data['status']; ?>">
                      <span class="invalid-feedback"><?php echo $data['status_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="pekerjaan">Pekerjaan</label>
                      <input type="text" class="form-control <?php echo (!empty($data['pekerjaan_err'])) ? 'is-invalid' : ''; ?>" name="pekerjaan" id="pekerjaan" value="<?php echo $data['pekerjaan']; ?>">
                      <span class="invalid-feedback"><?php echo $data['pekerjaan_err'] ?></span>
                    </div>

                    <div class="form-group">
                      <label for="umur">Umur</label>
                      <input type="text" class="form-control <?php echo (!empty($data['umur_err'])) ? 'is-invalid' : ''; ?>" name="umur" id="umur" value="<?php echo $data['umur']; ?>">
                      <span class="invalid-feedback"><?php echo $data['umur_err'] ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
                </form>
            </div>
 
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
