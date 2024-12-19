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
                        <p style="font-weight: bold;"><?= $usercart[$count]['qty'] . ' x Rp' . number_format($product['price'], 0, ',', '.') ?></p>
                    </div>
                </div>
                <?php 
                $total += $usercart[$count]['qty'] * $product['price'];
                $count++; 
                endforeach ?>
            </section>
            <section class="right-section order-summary">
                <h2>Belanjaanmu</h2>
                <form>
                    <div class="order-detail" style="margin-bottom: 15px">
                        <label for="ongkir">Metode Pengiriman</label>
                        <select name="ongkir" id="ongkir" aria-placeholder="Pilih Pengiriman" style="color: grey;" onchange="changeong();">
                            <option value="" disabled selected>Pilih Pengiriman</option>
                            <option value="12000">Normal - Rp12.000</option>
                            <option value="15000">Kargo - Rp15.000</option>
                            <option value="35000">Next Day - Rp35.000</option>
                            <option value="50000">Same Day - Rp50.000</option>
                        </select>
                    </div>
                </form>
                <div class="order-detail">
                    <span>Total Harga (<?= $count; ?> barang)</span>
                    <span>Rp<?= number_format($total, 0, ',', '.'); ?></span>
                </div>
                <div class="order-detail">
                    <span>Total Asuransi Pengiriman</span>
                    <span>Rp<?= number_format(1000, 0, ',', '.'); ?></span>
                </div>
                <div class="order-detail">
                    <span>Total Biaya Proteksi</span>
                    <span>Rp<?= number_format(2000, 0, ',', '.'); ?></span>
                </div>
                <div class="order-detail">
                    <span>Ongkos Kirim</span>
                    <span id="hargaOngkir">-</span>
                </div>
                <div class="total" style="margin-top: 15px">
                    <span>Total Belanja</span>
                    <span id="totalBelanja">Rp<?= number_format($total, 0, ',', '.'); ?></span>
                </div>
                <button class="payment-button">Pilih Pembayaran</button>
            </section>
        </main>
    </div>
</body>
</html>
<script>
    var total = <?= $total ?>;
    var ongkir = 0;
    var asuransi = 1000;
    var proteksi = 2000;

    function changeong() {
        let selectbox = document.getElementById('ongkir');
        let selected = parseInt(selectbox.options[selectbox.selectedIndex].value); // Ambil nilai ongkos kirim baru
        
        ongkir = selected;
        let totalBelanja = total + ongkir + asuransi + proteksi;

        document.getElementById('hargaOngkir').innerHTML = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(ongkir);
        document.getElementById('totalBelanja').innerHTML = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalBelanja);
    }
</script>
