<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List product</title>
    <link rel="stylesheet" href="<?= CSS . 'admin-order-list.css'; ?>">
</head>

<body>
    <header>
        <button class="back-button">←</button>
        <h1>Daftar pesanan</h1>
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
                <a href="product-list" class="menu-item">Daftar Produk</a>
                <a href="order-list" class="menu-item active">Daftar Pesanan</a>
                <a href="logout" class="menu-item">Logout</a>
            </nav>
        </aside>
        <main class="main-content">
            <?php foreach($orderdetail as $order) : $totalproduk = 0?>
            <section class="orders">
                <div class="order">
                    <div class="order-details">
                        <div class="product-info">
                            <p>Order Invoice: <?= $order[0]['order_id']; ?></p>
                            <button id="myButton" class="btn detail-btn">Detail Pesanan</button>
                            <div id="popupContainer" class="popup">
                                <div class="order-summary">
                                    <div class="header">
                                        <h2>Budi</h2>
                                        <p>(+62) 812 3456 7891</p>
                                    </div>
                                    <div class="address">
                                        <p>jalan inpres no.40b, kebon pala, makasar jakarta timur, Makasar, Jakarta Timur, DKI Jakarta, 6281234567891</p>
                                        <p>MAKASAR, KOTA JAKARTA TIMUR, DKI JAKARTA, ID, 13650</p>
                                    </div>
                                    <?php foreach($order as $product) :?>
                                    <div class="order-item">
                                        <img src="<?= ASSET . $product['img']; ?>" alt="<?= $product['name']; ?>" class="item-image">
                                        <div class="item-details">
                                            <p><?= $product['name']; ?></p>
                                            <p>Jumlah Product:<strong><?= $product['qty']; ?></strong></p>
                                        </div>
                                    </div>
                                    <?php $totalproduk += (int)$product['price']; endforeach ?>
                                    <div class="total">
                                        <p>Total harga (<?= $product['qty']; ?> barang): <span><?= number_format($totalproduk, 0, ',', '.'); ?></span></p>
                                        <p>Total Asuransi Pengiriman: <span>Rp1.000</span></p>
                                        <p>Total Biaya Proteksi: <span>Rp.2.000</span></p>
                                        <h3>Total: <span>Rp<?= number_format($order[0]['total'], 0, ',', '.'); ?></span></h3>
                                    </div>
                                    <div class="actions">
                                        <div class="action-box">
                                            <h4>Pengiriman</h4>
                                            <p><strong><?= $order[0]['shipping']; ?></strong></p>
                                            <p>Estimasi tiba hari ini - 14 Dec</p>
                                        </div>
                                        <div class="action-box">
                                            <h4>Pembayaran</h4>
                                            <p><strong><?= $order[0]['payment']; ?></strong></p>
                                        </div>
                                    </div>
                                    <div class="button-container">
                                        <button id="closePopup" class="button-card">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-status">
                        <label><input type="checkbox" <?= $order[0]['status'] == 1 ? "checked" : ""; ?>> Sedang Diproses</label>
                        <label><input type="checkbox" <?= $order[0]['status'] == 2 ? "checked" : ""; ?>> Sedang Dikirim</label>
                        <label><input type="checkbox" <?= $order[0]['status'] == 3 ? "checked" : ""; ?>> Pesanan Selesai</label>
                    </div>
                </div>
            </section>
            <?php endforeach ?>
        </main>
        <aside class="highlights">
            <h2>Highlight</h2>
            <p>Produk Terlaris Bulan Ini!</p>
            <div class="highlight-item">
                <img src="chair.png" alt="Product">
                <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi Kerja 800 Abu - 800 Abu</p>
                <span>Terjual sebanyak 54</span>
            </div>
            <div class="highlight-item">
                <img src="chair.png" alt="Product">
                <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi Kerja 800 Abu - 800 Abu</p>
                <span>Terjual sebanyak 54</span>
            </div>
        </aside>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const myButton = document.getElementById("myButton");
            const popupContainer = document.getElementById("popupContainer");
            const closePopup = document.getElementById("closePopup");

            myButton.addEventListener("click", function () {
                popupContainer.classList.add("show");
            });

            closePopup.addEventListener("click", function () {
                popupContainer.classList.remove("show");
            });

            window.addEventListener("click", function (event) {
                if (event.target === popupContainer) {
                    popupContainer.classList.remove("show");
                }
            });
        });
    </script>
</body>
</html>