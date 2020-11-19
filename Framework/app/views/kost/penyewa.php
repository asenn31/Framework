<?php require_once APPROOT.'/views/inc/header.php'; ?>

<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/kost/tambah" role="button">Tambah Data</a>
<form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search by name" aria-label="Search" name="nama_penyewa" id="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari Data</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Penyewa</th>
            <th>Nama Penyewa</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Pekerjaan</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['penyewa'] as $penyewa) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $penyewa->kode_penyewa; ?></td>
            <td><?php echo $penyewa->nama_penyewa; ?></td>
            <td><?php echo $penyewa->jenis_kelamin; ?></td>
            <td><?php echo $penyewa->status; ?></td>
            <td><?php echo $penyewa->pekerjaan; ?></td>
            <td><?php echo $penyewa->umur; ?></td>
            <td>
                <a class="btn btn-success" href="<?php echo URLROOT; ?>/kost/update/<?php echo $penyewa->id; ?>" role="button"><i class="fas fa-pencil-alt    "></i></a>
                <a class="btn btn-danger" href="<?php echo URLROOT; ?>/kost/hapus/<?php echo $penyewa->id; ?>"  role="button"><i class="fas fa-trash    "></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
