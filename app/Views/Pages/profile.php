<?php
$session = session()->get('user_session');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="<?= CSS . 'profile.css'?>">
  <link rel="icon" href="<?= ASSET.'logo.png'; ?>">
</head>
<body>
<header>
    <a href="<?= base_url('/'); ?>">
    <button class="back-button">&#8592;</button></a>
    <h2 style="text-align: center;">Profile</h2>
</header>

  <div class="container">
    <div class="profile">
      <div class="profile-name"><?= esc($session['username'] ?? '') ?></div>
      <div class="profile-email"><?= esc($session['email'] ?? '') ?></div>
      <a href="<?= base_url('/cart'); ?>" class="button1">Keranjang</a>
      <a href="<?= base_url('/wishlist'); ?>" class="button1">Wishlist</a>
      <a href="#" class="button1">Daftar Pesanan</a>
      <a href="#" class="button1">Daftar Alamat</a>
      <a href="service/logout" class="button1">Logout</a>
    </div>
  </div>
</body>
</html>
