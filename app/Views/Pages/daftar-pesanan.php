<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
    <link rel="stylesheet" href="<?= CSS . 'daftar-pesanan.css' ?>">

<body>
    <header>
        <a href="<?= base_url('/'); ?>">
            <button class="back-button">←</button>
        </a>
        <h1>Daftar Pesanan</h1>
    </header>

    <div class="container">
        <div class="order-list">
            <?php foreach ($orders as $index => $order):  ?>
                <div class="order-item">
                    <?php foreach ($order_details[$index] as $detail): $product = null;
                     foreach ($products as $prod) {
                        if ($prod['product_id'] === $detail['pID']) {
                            $product = $prod;
                            break;
                        }
                    }
                    ?>
                        <img src="<?= ASSET . $product['img']; ?>" alt="<?= $product['name']; ?>">
                        <div class="order-details">
                            <h2><?= $product['name']; ?></h2>
                            <p><?= $detail['qty']; ?> x <span class="price"><span class="price">Rp<?= number_format($product['price'], 0, ',', '.'); ?></span></p>
                            <p class="date"><?= $order['updated_at']; ?> <span class="status"><?= ucfirst($order['status']); ?></span></p>
                            <p class="total">Total Belanja: <span>Rp<?= number_format($order['total'], 0, ',', '.'); ?></span></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>