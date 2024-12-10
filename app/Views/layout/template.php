<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= CSS.'homepage.css'; ?>">
  <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
  <title><?= $title ?></title>
</head>

<body>

  <div class="header">
    <div class="logo">
      <img src="<?= ASSET.'logo.png'; ?>" alt="Logo">
    </div>
    <input type="text" placeholder="Cari di Ventura" class="search-bar">
    <div class="icons">
      <?php if(session()->get('username')): ?>
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

    <?= $this->renderSection('content'); ?>
  
</body>
</html>