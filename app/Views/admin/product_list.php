<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= CSS . "admin-product-list.css" ?>">
    <link rel="icon" href="<?= ASSET . "logo.png" ?>">
</head>
<style>
    .main-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        box-sizing: border-box;
    }

    .product-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        margin-top: 20px;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .filter-button {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .filter-button button {
        padding: 10px 15px;
        background-color: #EA6932;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }


</style>

<body>
    <header>
        <h1 style="color: #e74c3c"><?= $title; ?></h1>
    </header>
    <div class="container">
        <aside class="sidebar">
            <div class="user-info">
                <p class="user-name"><?= $user['username']; ?></p>
                <p class="user-email">ID admin: <?= $user['admin_id']; ?></p>
            </div>

            <nav class="menu">
                <a href="dashboard" class="menu-item">Dashboard</a>
                <a href="productmanager" class="menu-item">Tambah Produk</a>
                <a href="<?= base_url('admin/product-list') ?>" class="menu-item active">Daftar Produk</a>
                <a href="#" class="menu-item">Daftar Pesanan</a>
                <a href="#" class=  "menu-item">Pengaturan</a>
            </nav>
        </aside>
        <main class="main-content" style="max-width: 1200px; margin: 0 auto; padding: 20px; box-sizing: border-box;">
            <?php 
            if(!empty($errors)){
                foreach ($errors as $error) {
                    echo $error;
                }
            }
            ?>
            <section class="product-search">
                <form action="" method="get" id="filter">
                    <input type="text" id="searchBar" placeholder="Cari Produk" name="keyword" onkeyup="cariProduk()" />
                </form>
                <div class="filter-button">
                    <a href="<?= base_url('admin/product-list'); ?>">
                        <button>Semua Produk</button>
                    </a>
                    <?php foreach($kategori as $k) :?>
                         <a href="<?= base_url('/admin/product-list?filter=' . $k['category_id']); ?>">
                            <button class="button-card"><?= $k['name']; ?></button>
                        </a>
                    <?php endforeach ?>
                    <a href="<?= base_url('/admin/product-list?availability=available'); ?>">
                        <button style="background-color: #2ecc71;">Stok Tersedia</button>
                    </a>
                    <a href="<?= base_url('/admin/product-list?availability=habis'); ?>">
                        <button style="background-color: red;">Stok Habis</button>
                    </a>
                </div>
            </section>
            <section class="product-list"
            style="display: grid; grid-template-columns: repeat(3, 1fr); margin-top: 20px;">
                <?php foreach($dataproduk as $p) : ?>
                <div class="product-card">
                    <img src="<?= ASSET. $p['img']; ?>" alt="Product Image">
                    <div class="product-info">
                        <p><?= $p['name']; ?></p>
                        <p class="price" style="color: #EA6932;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
                        <div class="product-actions">
                            <a href="../Product/delproduct/<?= $p['product_id']; ?>"><button class="delete-button">Hapus</button></a>
                            <a href="<?= base_url('admin/product/detail/'.$p['product_id']); ?>"><button class="view-button">Lihat</button></a>
                            <button class="stock-button" style="background-color: <?= $p['stock'] > 0 ? '#2ecc71' : 'red'; ?>;">
                                <?= $p['stock'] > 0 ? $p['stock'] : 'Habis'; ?>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </section>
        </main>
        
    </div>
</body>

