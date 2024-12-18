<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<link rel="stylesheet" href="<?= CSS . 'keranjang.css' ?>">
<link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
</head>
<style>
.cart-summary {
    display: flex;
    flex-direction: column;
    padding: 15px;
    background-color: #fff;
    border-top: 1px solid #ddd;
    margin-top: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.shop-details {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
}

.summary-buttons {
    display: flex;
    justify-content: space-between;
}

.clear-cart,
.checkout {
    background-color: #EA6932;
    color: white;
    border: none;
    padding: 10px 15px;
    text-decoration: none;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    width: 48%;
}

.clear-cart:hover,
.checkout:hover {
    background-color: #ff8500;
}

.remove-button {
    background-color: #dc3545; /* Warna merah untuk tombol hapus */
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
}

.remove-button:hover {
    background-color: #c82333;
}

</style>


<body>

    <header>
        <a href="<?= base_url(); ?>">
            <button class="back-button">&#8592;</button>
        </a>
        <h2 style="text-align: center;">Keranjang</h2>
    </header>

<div class="cart-container">
    <div class="cart-items">
        <!-- <div class="select-all">
            <input type="checkbox" id="select-all">
            <label for="select-all">Pilih Semua</label>
        </div> -->
        <?php
            if(session()->getFlashdata('kosonk')) :
                echo session()->getFlashdata('kosonk');
            else:
                $count = 0;
                foreach($dataprod as $cd) :
                  ?>
                    <div class="cart-item">
                        <!-- <input type="checkbox"> -->
                        <img src="<?= ASSET . $cd['img'] ?>" alt="<?= $cd['name'] ?>" class="item-image">
                        <div class="item-info">
                            <p class="store-name"><?php echo $cd['name'] ?></p>
                        </div>
                        <div class="item-price">
                            <p>Rp<?= number_format($cd['price'], 0, ',', '.'); ?> x <?= $usercart[$count]['qty'] ?> =</p>
                            <p class="total-price">Rp<?php $total = $cd['price'] * $usercart[$count]['qty'];echo number_format($total, 0, ',', '.'); ?></p>
                            <form action="<?= base_url('cart/delcart/'.$cd['product_id']); ?>" method="post">
                                <button type="submit" class="remove-button">Hapus</button>
                            </form>
                        </div>
                    </div>
            <?php
                $count++;
                endforeach;
            endif;
              ?>
    </div>
    
    <div class="cart-summary">
            <div class="shop-details">
                <p>Total Harga:</p>
                <p class="total-cart-price">Rp<?= isset($total_price) ? number_format($total_price, 0, ',', '.') : 0; ?></p>
                 <!-- <p class="total-cart-price">Rp 50.000</p> -->
            </div>
            <div class="summary-buttons">
                <a href="<?= base_url('/cart/clear') ?>" class="clear-cart">Hapus Semua</a>
                <a href="<?= base_url('/cart/checkout'); ?>" class="checkout">Checkout</a>
            </div>
    </div>
</div>

</body>
</html>
