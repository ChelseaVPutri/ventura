<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="<?= CSS.'add-product.css'; ?>">
    <link rel="icon" href="<?php echo ASSET.'logo.png'; ?>">
</head>

<style>
    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 10px;
    }

    .button-card{
    background-color: #ff6600; 
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
    width: 150px;
    opacity: 0.8;
    transition: 0.3s;
  }

  .button-card:hover{
    opacity: 1
  }

  .summary-container {
    width: 90%;
    margin: 20px auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .summary-card {
    background-color: white;
    border: 1px solid lightgray;
    color: #ff6600;
    padding: 15px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1.2em;
    margin-bottom: 15px;
}
</style>

<body>
    <header style="display: flex; justify-content: space-between; align-items: center; padding: 10px;">
        <!-- <a class="back-button" href="<//?= base_url('AdminPages/adminLogout') ?>" style="text-decoration: none;">&#8592;</a> -->
        <h2 style="text-align: center; margin: 0; flex-grow: 1">Halaman Admin</h2>
        <a href="<?= base_url('AdminPages/adminLogout'); ?>" style="text-decoration: none">
            <button style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Logout</button>
        </a>
    </header>

    <div class="button-container">
        <a href="<?= base_url('admin/dashboard'); ?>">
            <button class="button-card">Dashboard</button>
        </a>
        <a href="<?= base_url('admin/product-list'); ?>">
            <button class="button-card">Daftar Produk</button>
        </a>
        <a href="<?= base_url('admin/productmanager') ?>">
            <button class="button-card">Tambah Produk</button>
        </a>
        <a href="#">
            <button class="button-card">Daftar Pesanan</button>
        </a>
    </div>

    <div class="summary-container">
        <h3 style="text-align: center; margin-bottom: 20px; color: #333; font-size: 1.5em; font-weight: bold;">Dashboard</h3>
        <div class="summary-card">
            <p style="margin: 0; font-weight: bold;"><strong>Jumlah Produk:</strong> <?= $total_products; ?></p>
        </div>
        <div class="summary-card">
            <p style="margin: 0; font-weight: bold;"><strong>Total Pendapatan:</strong></p>
        </div>
        <div class="summary-card">
            <p style="margin: 0; font-weight: bold;"><strong>Pesanan akan Diproses:</strong></p>
        </div>
        <div class="summary-card">
            <p style="margin: 0; font-weight: bold;"><strong>Pesanan Selesai:</strong></p>
        </div>
    </div>

</body>
</html>
