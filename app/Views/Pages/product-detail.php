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
                <p style="margin-bottom: 15px;"><strong>Stok Tersedia: </strong><?= $product['stock'] ?></p>
                <h3>Deskripsi</h3>
                <p class="description">
                    <?= $product['description']; ?>
                </p>
                
                <?php //if(session()->get('is_login')): ?>
                <div class="quantity-section">
                    <form action="<?= base_url('cart/addcart/') . $product['product_id']; ?>" method="post">
                        <input class="quantity-input" type="number" value="1" min="1" max="<?= $product['stock']; ?>" name="qty_add">
                        <button class="cart-button" name="add_cart">Masukkan ke Keranjang</button>
                    </form>
                    <form action="<?= base_url('wishlist/addWishlist/'. $product['product_id']); ?>" method="post">
                        <button class="cart-button" name="wishlit_cart" style="margin-left: 10px;">Tambahkan ke Wishlist</button>
                    </form>
                </div>
                <?php //endif; ?>

                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" style="color: green">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" style="color: red">
                    <?= session()->getFlashdata('error'); ?>
                </div>
                <?php endif; ?>
                <!-- <i style="color: green;"><//?php echo $masuk;?></i> -->
            </div>
        </div>
    </div>

</body>
</html>
