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
<h5 class="text-center">
  <strong class="text-primary mb-2">Pendaftaran Anggota Baru</strong>
</h5>
<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div> 
<?php endif; ?>
    <form action="<?= base_url('/user/data/t'); ?>" method="post" class="mb-4">
    <?= csrf_field(); ?>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="masukkan nama">
      <div id="nama" class="invalid-feedback">
      <?= $validation->getError('nama'); ?>
      </div>  
    </div>
  </div>
  <div class="form-group row">
    <label for="saldo" class="col-sm-2 col-form-label">Saldo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('saldo')) ? 'is-invalid' : ''; ?>" id="saldo" name="saldo" placeholder="masukkan saldo">
      <div id="saldo" class="invalid-feedback">
      <?= $validation->getError('saldo'); ?>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

</div>
<?= $this->endSection(); ?>