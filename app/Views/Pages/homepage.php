<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
  <h2 style="text-align: center;">Produk Rekomendasi</h2>

  <div class="product-container" style="display: grid; grid-template-columns: auto auto auto auto;">
    <?php foreach($dataproduk as $p) : ?>
      <div class="product-card">
        <img src="<?= ASSET . $p['img'] ?>" alt="product-image">
        <p><?= $p['name']; ?></p>
        <p class="price" style="color: #EA6932;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
      </div>
    <?php endforeach; ?>

  </div>

<?= $this->endSection(); ?>
