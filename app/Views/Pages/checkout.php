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
                            <select name="ongkir" id="ongkir" aria-placeholder="Pilih Pengiriman" style="color: grey;" onchange="changeong();">
                                <option value="" disabled selected>Pilih Pengiriman</option>
                                <option value=12000>Normal</option>
                                <option value=15000>Kargo</option>
                                <option value=35000>Next day</option>
                                <option value=50000>Same day</option>
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
    var ongkir = 0;
    function changeong(){
        let selectbox = document.getElementById('ongkir');
        // let selected = selectbox.options[selectbox.selectedIndex].value;
        let selected = parseInt(selectbox.options[selectbox.selectedIndex].value);
        // ongkir += parseInt(selected);
        ongkir = selected;
        // console.log(ongkir);
        document.getElementById('hargaOngkir').innerHTML = Intl.NumberFormat('id-ID', {style:'currency', currency: 'IDR'}).format(ongkir);
    }
</script>
