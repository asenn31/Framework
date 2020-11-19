<?php require_once APPROOT.'/views/inc/header.php'; ?>

<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/cs/tambahKamar" role="button">Tambah Data</a>
<form class="form-inline" action="" method = "get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search by Room Code" aria-label="Search" name="kode_kamar" id="search2">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari Data</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Kamar</th>
            <th>Luas kamar</th>
            <th>Harga Kamar</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($data['kamar'] as $kamar) : ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $kamar->kode_kamar; ?></td>
            <td><?php echo $kamar->luas_kamar; ?></td>
            <td><?php echo $kamar->harga_kamar; ?></td>
            <td><?php echo $kamar->keterangan; ?></td>
            <td>
                <a class="btn btn-danger" href="<?php echo URLROOT; ?>/cs/hapusKamar/<?php echo $kamar->id; ?>"  role="button"><i class="fas fa-trash    "></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
