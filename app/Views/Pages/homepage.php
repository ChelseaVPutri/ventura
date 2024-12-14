<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= CSS . 'homepage.css'; ?>">
  <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
  <title><?= $title ?></title>
</head>

<body>
  <div class="header">
    <div class="logo">
      <a href="<?= base_url(); ?>">
        <img src="<?= ASSET.'logo.png'; ?>" alt="Logo">
      </a>
    </div>
    <form action="" method="get" id="filter">
      <input type="text" placeholder="Cari di Ventura" class="search-bar" name="keyword" id="keyword">
    </form>
    <div class="icons">
      <?php if(session()->get('user_session')): ?>
        <a href="cart"><img src="<?= ASSET.'Keranjang.svg'; ?>" alt="Cart" class="icon"></a>
        <a href="<?= base_url('/wishlist'); ?>"><img src="<?= ASSET.'wishlist.svg'; ?>" alt="Cart" class="icon" style="color: #EA6932;"></a>
        <a href="profile" id="profile-text">Profile</a>
      <?php else : ?>
        <nav>
          <a href="login">Login</a>
          <a href="register">Register</a>
        </nav>
      <?php endif; ?>
    </div>
  </div>

  <div class="category-container">
    <?php foreach($kategori as $k) :?>
      <a href="<?= base_url('/?keyword=' . $k['category_id']); ?>">
        <button class="button-card"><?= $k['name']; ?></button>
      </a>
    <?php endforeach ?>
  </div>

  <h2 style="text-align: center;">Produk Rekomendasi</h2>

  <div class="product-container" style="display: grid; grid-template-columns: auto auto auto auto;">
    <?php foreach($dataproduk as $p) : ?>
      <a href="<?= base_url('product/detail/'.$p['product_id']); ?>">
        <div class="product-card">
          <img src="<?= ASSET . $p['img'] ?>" alt="product-image">
          <p><?= $p['name']; ?></p>
          <p class="price" style="color: #EA6932;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
        </div>
      </a>
    <?php endforeach; ?>

  </div>

  </body>
</html>
