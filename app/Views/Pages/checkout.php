<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
    <link rel="stylesheet" href="<?= CSS . 'checkout.css' ?>">
</head>
<body>
    <header>
        <a href="<?= base_url('cart'); ?>">
            <button class="back-button">←</button>
        </a>
        <h1>Checkout</h1>
    </header>

    <div class="container">
        <main class="grid-layout">
            <section class="left-section">
                <div class="shipping-address">
                    <h2>Alamat Pengiriman</h2>
                    <div class="address">
                        <span class="icon">📍</span>
                        <span>Rumah - Budi</span>
                    </div>
                </div>
                <?php 
                $count = 0;
                $total = 0;
                foreach($dataprod as $product): ?>
                <div class="product-details">
                    <img src="<?= ASSET . $product['img']; ?>" alt="<?= $product['name']; ?>" class="product-image">
                    <div class="product-info">
                        <p><?= $product['name']; ?></p>
                        <form>
                            <select name="ongkir" id="ongkir" aria-placeholder="pilih pengiriman" style="color: grey;" onchange="changeong();">
                                <option value="" disabled selected>pilih pengiriman</option>
                                <option value="Rp12.000">ekspedisi</option>
                                <option value="Rp15.000">kargo</option>
                                <option value="Rp35.000">next day</option>
                                <option value="Rp50.000">Gosend</option>
                            </select>
                        </form>
                    </div>
                    <p style="font-weight: bold;"><?= $usercart[$count]['qty'] . ' x Rp' . number_format($product['price'], 0, ',', '.') ?></p>
                </div>
                <?php 
                $total += $usercart[$count]['qty'] * $product['price'];
                $count++; 
                endforeach ?>
            </section>
            <section class="right-section order-summary">
                <h2>Belanjaanmu</h2>
                <div class="order-detail">
                    <span>Total harga (<?= $count++; ?> barang)</span>
                    <span>Rp<?=number_format($total, 0, ',', '.'); ?></span>
                </div>
                <div class="order-detail">
                    <span>Total Asuransi Pengiriman</span>
                    <span>-</span>
                </div>
                <div class="order-detail">
                    <span>Total Biaya Proteksi</span>
                    <span>-</span>
                </div>
                <div class="order-detail">
                    <span>Ongkos Kirim</span>
                    <span id="hargaOngkir">-</span>
                </div>
                <div class="total">
                    <span>Total Belanja</span>
                    <span>Rp259.900</span>
                </div>
                <button class="payment-button">Pilih Pembayaran</button>
            </section>
        </main>
    </div>
</body>
</html>
<script>
    function changeong(){
        var selectbox = document.getElementById('ongkir');
        var selected = selectbox.options[selectbox.selectedIndex].value;
        document.getElementById('hargaOngkir').innerHTML = selected;
    }
</script>
