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
        <a href="">
            <button class="button-card">Daftar Produk</button>
        </a>
        <a href="<?= base_url('admin/productmanager') ?>">
            <button class="button-card">Tambah Produk</button>
        </a>
        <a href="<?= base_url('admin/product-list') ?>">
            <button class="button-card">Daftar Pesanan</button>
        </a>
    </div>

    <div class="container">
        <?php 
        if(!empty($errors)){
            foreach ($errors as $error) {
                echo $error;
            }
        }
        ?>
        
        <section class="product-list">
            <?php foreach($dataproduk as $p) : ?>
            <div class="product-card">
                <img src="<?= ASSET. $p['img']; ?>" alt="Product Image">
                <div class="product-info">
                    <p><?= $p['name']; ?></p>
                    <p class="price" style="color: #EA6932;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
                    <div class="product-actions">
                        <a href="../Product/delproduct/<?= $p['product_id']; ?>"><button class="delete-button">Hapus</button></a>
                        <a href="<?= base_url('admin/product/detail/'.$p['product_id']); ?>"><button class="view-button">Lihat</button></a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </section>
    </div>
</body>
</html>
