<?php require_once APPROOT.'/views/inc/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Ubah Data</h2>
                <small>Silahkan Isi Form</small>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT;?>/cs/update/<?php echo $data['penyewa']->id; ?>" method="post">
                    <div class="form-group">
                      <label for="kode_penyewa">Kode Penyewa</label>
                      <input required type="text" class="form-control" name="kode_penyewa" id="kode_penyewa" value="<?php echo $data['penyewa']->kode_penyewa; ?>">
                    </div>

                    <div class="form-group">
                      <label for="nama_penyewa">Nama Penyewa</label>
                      <input required type="text" class="form-control" name="nama_penyewa" id="nama_penyewa" value="<?php echo $data['penyewa']->nama_penyewa; ?>">
                    </div>

                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <input required type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $data['penyewa']->jenis_kelamin; ?>">
                    </div>

                    <div class="form-group">
                      <label for="status">Status</label>
                      <input required type="text" class="form-control" name="status" id="status" value="<?php echo $data['penyewa']->status; ?>">
                    </div>

                    <div class="form-group">
                      <label for="pekerjaan">Pekerjaan</label>
                      <input required type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?php echo $data['penyewa']->pekerjaan; ?>">
                    </div>

                    <div class="form-group">
                      <label for="umur">Umur</label>
                      <input required type="text" class="form-control" name="umur" id="umur" value="<?php echo $data['penyewa']->umur; ?>">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Ubah Data</button>
                </form>
            </div>
 
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
