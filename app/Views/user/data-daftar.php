<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

<div class="row mb-3">
    <div class="mr-4">
        <a href="<?= base_url('/user/data/t'); ?>" class="btn btn-primary">anggota baru</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/data/d'); ?>" class="btn btn-primary">manajemen anggota</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/data/f'); ?>" class="btn btn-primary">file anggota</a>
    </div>
</div>

<div class="row">
  <div class="col"> 
    <h4 class="">
  <strong class="text-primary mb-2">Manajemen Data Anggota</strong>
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
      <th scope="col">Nama</th>
      <th scope="col">Data</th>
      <th scope="col">Saldo</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($users as $u) : ?>
    <?php $i++; ?>
      <th scope="row"><?= $i; ?></th>
      <td><?= $u['nama']; ?></td>
      <td><a href="\document\<?= $u['data']; ?>" class="text-primary">download data</a></td>
      <td><?= $u['saldo']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>       
</div>
<?= $pager->links('users','pageview') ?>


</div>
<?= $this->endSection(); ?>