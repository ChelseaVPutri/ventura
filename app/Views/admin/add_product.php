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

    <div class="container">
        <?php 
        if(!empty($errors)){
            foreach ($errors as $error) {
                echo $error;
            }
        }
        ?>
        <section class="add-product">
            <h2>Tambah Produk</h2>
            <form action="<?= base_url('product/addproduct'); ?>" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
                <input type="text" id="name" name="name" placeholder="Masukkan nama produk" required>
                <input type="number" id="price" name="price" placeholder="Masukkan harga produk" required>
                <input type="number" id="stock" name="stock" placeholder="Masukkan stock produk" required>
                <input type="text" id="description" name="description" placeholder="Masukkan deskripsi produk" maxlength="255" required>
                <select name="kategori" id="kategori" aria-placeholder="pilih kategori" style="color: grey;">
                    <option value="" disabled selected>Pilih Kategori</option>
                    <?php foreach($categories as $c) : ?>
                        <option value="<?= $c['category_id']; ?>"><?= $c['name']; ?></option>
                    <?php endforeach ?>
                </select>
                <input type="file" name="img" id="img" accept="image/*">
                <button type="submit" class="add-button">Tambah Produk</button>

                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" style="color: green">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php endif; ?>

            </form>
        </section>
    </div>
</body>
</html>
