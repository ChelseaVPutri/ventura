<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="kelola_produk.css">
</head>
<body>
    <header>
        <button class="back-button">&#8592;</button>
        <h2 style="text-align: center;">detail produk</h2>
    </header>

    <div class="container">  
        <section class="add-product">
            <h2>Tambah Produk</h2>
            <form>
                <input type="text" placeholder="Masukkan nama produk" required>
                <input type="number" placeholder="Masukkan harga produk" required>
                <input type="file" placeholder="Masukkan gambar produk">
                <input type="number" placeholder="Masukan stock produk" required>
                <select name="kategori" id="kategori" aria-placeholder="pilih kategori" style="color: grey;">
                    <option value="" disabled selected>pilih kategori</option>
                    <option value="kategori[1]">kategori 1</option>
                    <option value="kategori[2]">kategori 2</option>
                    <option value="kategori[3]">kategori 3</option>
                    <option value="kategori[4]">kategori 4</option>
                </select>
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
                    <p class="category">(kategori)</p>
                    <div class="product-actions">
                        <button class="delete-button">Hapus</button>
                        <button class="view-button">Lihat</button>
                        <button class="stock-button">stock</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <img src="chair.png" alt="Product Image">
                <div class="product-info">
                    <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
                    <p class="price">Rp259.900</p>
                    <p class="category">(kategori)</p>
                    <div class="product-actions">
                        <button class="delete-button">Hapus</button>
                        <button class="view-button">Lihat</button>
                        <button class="stock-button">Stock</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
