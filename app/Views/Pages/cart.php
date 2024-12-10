<?php 
// @include '../service/connection.php';
// session_start();
// if($_SESSION['is_login'] && $_SESSION['oauth_id']){
//     // $id = $_SESSION['user_id'];
//     $oauth_id = $_SESSION['oauth_id'];
//     $folder = "/uts/assets/";
//     $fetch_user_query = "SELECT cart.cart_id, users.user_id, users.oauth_id, cart.product_id, cart.cart_qty
//     FROM cart JOIN users ON cart.user_id = users.user_id
//     JOIN product ON cart.product_id = product.product_id
//     WHERE users.oauth_id = '$oauth_id'";
//     $fetch_user = $conn->query($fetch_user_query);
// } elseif($_SESSION['is_login'] && $_SESSION['user_id']) {
//     $id = $_SESSION['user_id'];
//     $folder = "/uts/assets/";
//     $fetch_user_query = "SELECT * FROM cart WHERE user_id = $id";
//     $fetch_user = $conn->query($fetch_user_query);
// } else {
//     header("Location: /uts/login-register/login.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<link rel="stylesheet" href="<?= CSS . 'keranjang.css' ?>">
<link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
</head>
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
                            <!-- <a class="remove-button" href="/uts/service/delete_cart.php?id=<?= 1//$pid?>">Hapus</a> -->
                        </div>
                    </div>
            <?php
                $count++;
                endforeach;
              ?>
    </div>
</div>

</body>
</html>
