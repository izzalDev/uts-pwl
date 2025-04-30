<?= $this->extend("layouts/default"); ?>
<?= $this->section("content"); ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Username : <?= session()->get('username'); ?></br>Role : <?= session()->get('role'); ?></h5>
  </div>
</div>
<?= $this->endSection(); ?> 
