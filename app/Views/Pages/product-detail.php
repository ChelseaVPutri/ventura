<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name']; ?> - Detail Produk</title>
    <link rel="stylesheet" href="<?= CSS . 'product-detail.css'?>">
    <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
</head>
<body>

    <header>
        <a href="<?= base_url(); ?>">
            <button class="back-button">&#8592;</button></a>
        <h2 style="text-align: center;">Detail Produk</h2>
    </header>

    <div class="container">
        <div class="product-section">
            <div class="product-image">
                <img src="<?= ASSET. $product['img']; ?>" alt="<?= $product['name']; ?>">
            </div>
            <div class="product-details">
                <object name="product_name">
                    <h2><?= $product['name']; ?></h2>
                </object>
                <object name="product_price">
                    <p class="price" style="color: #e74c3c">Rp<?= number_format($product['price'], 0, ',', '.'); ?></p>
                </object>
                <h3>Deskripsi</h3>
                <p class="description">
                    <?= $product['description']; ?>
                </p>
                
                <div class="quantity-section">
                    <form action="<?= base_url('cart/addcart/') . $product['product_id']; ?>" method="post">
                        <input class="quantity-input" type="number" value="1" min="1" max="<?= $product['stock']; ?>" name="qty_add">
                        <button class="cart-button" name="add_cart">Masukkan ke Keranjang</button>
                        <button class="cart-button" name="wishlit_cart">Tambahkan ke Wishlist</button>
                    </form>
                </div>
                <!-- <i style="color: green;"><//?php echo $masuk;?></i> -->
            </div>
        </div>
    </div>

</body>
</html>
