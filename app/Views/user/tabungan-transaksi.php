<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

<div class="row mb-3">
    <div class="mr-4">
        <a href="<?= base_url('/user/tabungan/t'); ?>" class="btn btn-primary">Setoran/Penarikan</a>
    </div>
    <div class="mr-4">
        <a href="<?= base_url('/user/tabungan/d'); ?>" class="btn btn-primary">Daftar Transaksi</a>
    </div>
</div>
  
<h5 class="text-center">
  <strong class="text-primary mb-2">Setoran/Penarikan</strong>
</h5>
<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div> 
<?php endif; ?>
    <form action="<?= base_url('/user/pinjaman/t'); ?>" method="post" class="mb-4">
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
    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" placeholder="masukkan jumlah">
      <div id="jumlah" class="invalid-feedback">
      <?= $validation->getError('jumlah'); ?>
      </div>
    </div>
  </div>
    <div class="form-group row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10 mb-2">
    <select class="form-select form-select-sm" aria-label="status" id="status" name="status">
    <option selected></option>
    <option value="setoran">setoran</option>
    <option value="penarikan">penarikan</option>
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