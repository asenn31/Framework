<?php require_once APPROOT.'/views/inc/header.php'; ?>

<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/cs/tambahTransaksi" role="button">Tambah Data</a>
<form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="kode_penyewa" id="search3">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari Data</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Penyewa</th>
            <th>Kode Fasilitas</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['transaksi'] as $transaksi) : ?>   
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $transaksi->kode_penyewa; ?></td>
            <td><?php echo $transaksi->kode_fasilitaskamar; ?></td>
            <td><?php echo $transaksi->tanggal_masuk; ?></td>
            <td><?php echo $transaksi->tanggal_keluar; ?></td>
            <td>
                <a class="btn btn-danger" href="<?php echo URLROOT; ?>/cs/hapusTransaksi/<?php echo $transaksi->id; ?>"  role="button"><i class="fas fa-trash    "></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
