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
  <strong class="text-primary mb-2">File Anggota</strong>
</h5>
<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div> 
<?php endif; ?>
    <form action="<?= base_url('/user/data/f'); ?>" method="post" enctype="multipart/form-data" class="mb-4">
    <?= csrf_field(); ?>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10 mb-2">
    <select class="form-select form-select-sm" aria-label="nama" id="nama" name="nama">
    <option selected></option>
    <?php foreach ($users as $v) : ?>
    <option value="<?= $v['nama']; ?>"><?= $v['nama']; ?></option>
    <?php endforeach; ?>
    </select> 
    <span>
        <?php if ($validation->hasError('nama')) : ?>
        <input type="hidden" class="is-invalid">
        <p class="text-danger invalid-feedback"><?= $validation->getError('nama'); ?></p>
        <?php endif; ?>
    </span>
  </div>  
  </div>
  <div class="form-group row">
    <label for="data" class="col-sm-2 col-form-label">Data</label>
    <div class="col">
      <input class="form-control form-control <?= ($validation->hasError('data')) ? 'is-invalid' : ''; ?>" id="data" name="data" type="file">
      <div id="data" class="invalid-feedback">
      <?= $validation->getError('data'); ?>
      </div> 
    </div>
  </div> 
  <div class="form-group row">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
   
</div>
<?= $this->endSection(); ?>