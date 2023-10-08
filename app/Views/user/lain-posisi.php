<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

<div class="row mb-3">
    <div class="mr-4">
        <a href="<?= base_url('/user/lain/l'); ?>" class="btn btn-primary">Laporan Laba Rugi</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/lain/p'); ?>" class="btn btn-primary">Laporan Posisi Keuangan</a>
    </div>
</div> 
 
<h5 class="text-center">
  <strong class="text-primary mb-2">Laporan Posisi Keuangan</strong>
</h5>
<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div> 
<?php endif; ?>
    <form action="<?= base_url('/user/lain/p'); ?>" method="post" class="mb-4">
    <?= csrf_field(); ?>
  <div class="form-group row">
    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" placeholder="masukkan data">
      <div id="jumlah" class="invalid-feedback">
      <?= $validation->getError('jumlah'); ?>
      </div> 
    </div>
  </div>
  <div class="form-group row">
    <label for="saldo" class="col-sm-2 col-form-label">Saldo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('saldo')) ? 'is-invalid' : ''; ?>" id="saldo" name="saldo" placeholder="masukkan data">
      <div id="saldo" class="invalid-feedback">
      <?= $validation->getError('saldo'); ?>
      </div> 
    </div>
  </div>
  <div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10 mb-2">
    <select class="form-select form-select-sm" aria-label="status" id="status" name="status">
    <option selected></option>
    <option value="aset">aset</option>
    <option value="distribusi">distribusi</option>
    </select>
    <span>
        <?php if ($validation->hasError('status')) : ?>
        <input type="hidden" class="is-invalid">
        <p class="text-danger invalid-feedback"><?= $validation->getError('status'); ?></p>
        <?php endif; ?>
    </span>
  </div>
  </div>
  <div class="form-group row">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

</div>
<?= $this->endSection(); ?>