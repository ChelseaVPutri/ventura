<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="<?= CSS.'add-product.css'; ?>">
    <link rel="icon" href="<?php echo ASSET.'logo.png'; ?>">
</head>
<body>
    <header>
        <a class="back-button" href="<?= base_url('service/logout') ?>">&#8592;</a>
        <h2 style="text-align: center;">Tambah Produk</h2>
    </header>

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
                    <option value="" disabled selected>pilih kategori</option>
                    <?php foreach($categories as $c) : ?>
                        <option value="<?= $c['category_id']; ?>"><?= $c['name']; ?></option>
                    <?php endforeach ?>
                </select>
                <input type="file" name="img" id="img" accept="image/*">
                <button type="submit" class="add-button">Tambah Produk</button>
            </form>
        </section>
        
        <section class="product-list">
            <?php foreach($dataproduk as $p) : ?>
            <div class="product-card">
                <img src="<?= ASSET. $p['img']; ?>" alt="Product Image">
                <div class="product-info">
                    <p><?= $p['name']; ?></p>
                    <p class="price" style="color: #EA6932;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
                    <div class="product-actions">
                        <a href="../Product/delproduct/<?= $p['product_id']; ?>"><button class="delete-button">Hapus</button></a>
                        <a href="../Product/viewadmin/<?= $p['product_id']; ?>"><button class="view-button">Lihat</button></a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </section>
    </div>
</body>
</html>
