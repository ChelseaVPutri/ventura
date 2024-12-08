<?php
// include "../service/connection.php";
// session_start();
// if($_SESSION['is_login']){
//   $usernama = $_SESSION['username'];
//   $email = $_SESSION['email'];
// }
// else{
//   header("Location: /uts/login-register/login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="<?= CSS . 'profile.css'?>">
</head>
<body>
<header>
    <a href="<?= base_url('/'); ?>">
    <button class="back-button">&#8592;</button></a>
    <h2 style="text-align: center;">Profile</h2>
</header>

  <div class="container">
    <div class="profile">
      <div class="profile-name"><?= session()->get('username') ?></div>
      <div class="profile-email"><?= session()->get('email')?></div>
      <a href="#" class="button1">Keranjang</a>
      <a href="#" class="button1">Wishlist</a>
      <a href="service/logout" class="button1">Logout</a>
    </div>
  </div>
</body>
</html>
