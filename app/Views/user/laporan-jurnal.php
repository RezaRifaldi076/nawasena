<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

<div class="row mb-3">
    <div class="mr-4">
        <a href="<?= base_url('/user/laporan/b'); ?>" class="btn btn-primary">Buku Besar</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/laporan/j'); ?>" class="btn btn-primary">Jurnal</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/laporan/p'); ?>" class="btn btn-primary">Laporan Posisi Keuangan</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/laporan/l'); ?>" class="btn btn-primary">Laporan Laba Rugi</a>
    </div>
</div>
  
<div class="row">
  <div class="col"> 
    <h4 class="">
  <strong class="text-primary mb-2">Jurnal</strong>
    </h4>
    <form action="" method="post">
      <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Masukkan Keyword" name="keyword">
      <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="submit">Cari</button>
    </div>
    </form>
  </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div> 
<?php endif; ?>

<?php $i = 0 + (5 * ($current -1)); ?>
<!-- Tabel -->
<div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Status</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Saldo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($users as $u) : ?>
    <?php if ($u['kategori'] == 'jurnal') : ?>
    <?php $i++; ?>
      <th scope="row"><?= $i; ?></th>
      <td><?= $u['tanggal']; ?></td>
      <td><?= $u['status']; ?></td>
      <td><?= $u['jumlah']; ?></td>
      <td><?= $u['saldo']; ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>       
</div>
<?= $pager->links('users','pageview') ?>

</div>
<?= $this->endSection(); ?>