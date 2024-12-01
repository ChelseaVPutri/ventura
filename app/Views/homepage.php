<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo CSS.'homepage.css'; ?>">
  <link rel="icon" href="<?php echo ASSET.'logo.png'; ?>">
  <title>Beranda</title>
</head>

<body>

  <div class="header">
    <div class="logo">
      <img src="<?php echo ASSET.'logo.png'; ?>" alt="Logo">
    </div>
    <input type="text" placeholder="Cari di Ventura" class="search-bar">
    <div class="icons">
      <img src="<?php echo ASSET.'Keranjang.svg'; ?>" alt="Cart" class="icon">
      <!-- <a href="#" id="profile-text">Profile</a> -->
    </div>
  </div>

  <h2 style="text-align: center;">Produk Rekomendasi</h2>

  <div class="product-container" style="display: grid; grid-template-columns: auto auto auto auto;">
    <div class="product-card">
      <img src="mask.png" alt="Mask">
      <p>MASKER SENSI DUCKBILL SACHET ISI 6 PCS</p>
      <p class="price">Rp14.900</p>
    </div>

    <div class="product-card">
      <img src="mouse.png" alt="Mouse">
      <p>VortexSeries ONI R1 LightWeight Ergonomic</p>
      <p class="price">Rp349.000</p>
    </div>

    <div class="product-card">
      <img src="fridge.png" alt="Fridge">
      <p>AQUA Elektronik Kulkas 2 Pintu 169 L AQR-D251</p>
      <p class="price">Rp2.595.000</p>
    </div>

    <div class="product-card">
      <img src="chair.png" alt="Chair">
      <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
      <p class="price">Rp259.900</p>
    </div>

  </div>

</body>
</html>