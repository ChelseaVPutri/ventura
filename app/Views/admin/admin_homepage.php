<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="<?php echo CSS.'admin-homepage.css'; ?>">
    <link rel="icon" href="<?php echo ASSET.'logo.png'; ?>">
</head>
<body>
    <header>
        <a class="back-button" href="<?php echo site_url('admin/logout') ?>">&#8592;</>
        <h2 style="text-align: center;">Detail Produk</h2>
    </header>

    <div class="container">  
        <section class="add-product">
            <h2>Tambah Produk</h2>
            <form>
                <input type="text" placeholder="Masukkan nama produk" required>
                <input type="number" placeholder="Masukkan harga produk" required>
                <input type="file" placeholder="Masukkan gambar produk">
                <input type="file" id="product-image-upload" accept="image/*" hidden>
                <button type="submit" class="add-button">Tambah Produk</button>
            </form>
        </section>
        
        <section class="product-list">
            <div class="product-card">
                <img src="chair.png" alt="Product Image">
                <div class="product-info">
                    <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
                    <p class="price">Rp259.900</p>
                    <div class="product-actions">
                        <button class="delete-button">Hapus</button>
                        <button class="view-button">Lihat</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <img src="chair.png" alt="Product Image">
                <div class="product-info">
                    <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
                    <p class="price">Rp259.900</p>
                    <div class="product-actions">
                        <button class="delete-button">Hapus</button>
                        <button class="view-button">Lihat</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
