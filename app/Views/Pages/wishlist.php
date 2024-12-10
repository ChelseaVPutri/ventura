<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="<?= CSS . 'wishlist.css'?>">
    <link rel="icon" href="<?= ASSET.'logo.png'; ?>">
</head>
<body>

    <header>
        <a href="<?= base_url('/'); ?>">
            <button class="back-button">&#8592;</button>
        </a>
        <h2 style="text-align: center;">Wishlist</h2>
    </header>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert-error"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <div class="product-container" style="display: grid; grid-template-columns: auto auto auto auto;">
        <?php if(empty($dataproduk)) : ?>
            <p style="text-align: center; font-size: 1.2rem; color: #555;">Wishlist Kosong</p>
        <?php else : ?>
            <?php foreach($dataproduk as $p) : ?>
                <a href="<?= base_url('product/detail/'.$p['product_id']); ?>" style="text-decoration: none;">
                    <div class="product-card">
                        <img src="<?= ASSET . $p['img'] ?>" alt="product-image">
                        <p><?= $p['name']; ?></p>
                        <p class="price" style="color: #EA6932; text-align: center;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
                </a>
                        <form action="<?= base_url('wishlist/delWishlist/' . $p['product_id']); ?>" method="post">
                            <button type="submit" class="remove-button"
                            style="background-color:#ef233c; border:none; cursor:pointer; font-size:14px; padding: 5px 10px; color: white; margin-top: 5px; border-radius: 5px;">
                            Hapus</button>
                        </form>
                    </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>

