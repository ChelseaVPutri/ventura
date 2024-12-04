<?= $this->extend('layout/template.php'); ?>

<?= $this->section('content'); ?>
  <h2 style="text-align: center;">Produk Rekomendasi</h2>

  <div class="product-container" style="display: grid; grid-template-columns: auto auto auto auto;">
    <div class="product-card">
      <img src="<?= ASSET . 'mask.png' ?>" alt="Mask">
      <p>MASKER SENSI DUCKBILL SACHET ISI 6 PCS</p>
      <p class="price">Rp14.900</p>
    </div>

    <div class="product-card">
      <img src="<?= ASSET . 'mouse.png' ?>" alt="Mouse">
      <p>VortexSeries ONI R1 LightWeight Ergonomic</p>
      <p class="price">Rp349.000</p>
    </div>

    <div class="product-card">
      <img src="<?= ASSET . 'fridge.png' ?>" alt="Fridge">
      <p>AQUA Elektronik Kulkas 2 Pintu 169 L AQR-D251</p>
      <p class="price">Rp2.595.000</p>
    </div>

    <div class="product-card">
      <img src="<?= ASSET . 'chair.png' ?>" alt="Chair">
      <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
      <p class="price">Rp259.900</p>
    </div>

  </div>

<?= $this->endSection(); ?>
