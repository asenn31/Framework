<?php require_once APPROOT.'/views/inc/header.php'; ?>

<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/kost/penyewa" role="button">Penyewa</a>
<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/kost/kamar" role="button">Kamar</a>
<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/kost/transaksi" role="button">Transaksi</a>
<a class="btn btn-primary mb-3" href="<?php echo URLROOT; ?>/kost/transaksiLain" role="button">Transaksi Lain</a>

<div class="jumbotron text-center">
    <h1 class="display-3 "><?php echo SITENAME; ?></h1>
    <hr class="my-2">
    <blockquote class="blockquote">
    <p class="mb-0"> Selamat Datang Di Menu Administrator <br></p>
    <p class="mb-0"><em>Silahkan Pilih Menu Yang Tersedia</em></p>
    </blockquote>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'; ?>
