<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
    <link rel="stylesheet" href="<?= CSS . 'checkout.css' ?>">
</head>
<style>
    .popup {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,
            0,
            0,
            0.4);
    display: none;
    justify-content: center; /* Horizontally center */
    align-items: center; /* Vertically center */
    background-color: rgba(0, 0, 0, 0.4); /* Dimmed background */
    }

    .popup.show {
    display: flex; /* Make it visible and centered */
    }

    .address-box {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    max-width: 600px;
    width: 100%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .close-button2 {
    background-color: white; 
    border: solid 1px #ccc;
    color: black;
    padding: 10px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
    width: 150px;
    opacity: 0.6;
    transition: 0.3s;
    justify-content: center;
    }

    .address-details {
    margin-bottom: 16px;
    }

    .name-and-phone {
    display: flex;
    /* justify-content: space-between; */
    align-items: center;
    }

    .name-and-phone h2 {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
  }
  
  .name-and-phone span {
    font-size: 14px;
    color: #666;
  }
  
  .edit-button {
    background: none;
    border: none;
    color: #f90;
    font-size: 14px;
    cursor: pointer;
  }
  
  .address-details p {
    font-size: 14px;
    color: #333;
    margin: 8px 0;
  }
  
  .add-address-button {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    background: #fff;
    font-size: 14px;
    font-weight: bold;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .add-address-button:hover {
    background: #f0f0f0;
  }

  .edit-address-box {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    max-width: 700px;
    width: 100%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  
  .input-group {
    display: flex;
    gap: 8px;
  }
  
  .input-group input {
    flex: 1;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    text-align: center;
  }
  
  textarea {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    resize: none;
    height: 60px;
  }

  .button-group {
    display: flex;
    justify-content: space-between;
  }
  
  .back-button-box {
    background-color: #ccc;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .ok-button-box {
    background-color: #f90;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
  }
</style>
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
                    <?php if($primary_address): ?>
                        <div class="address">
                            <!-- <span>Rumah - Budi</span> -->
                            <span class="icon">📍</span>
                            <span style="font-weight: bold;"><?= $primary_address['nama']; ?> - <?= $primary_address['telepon']; ?></span>
                        </div>
                        <p><?= $primary_address['alamat_lengkap'] ?></p>
                        <p style="margin-bottom: 15px"><?= $primary_address['kecamatan'] ?>, <?= $primary_address['kota_kabupaten'] ?>, <?= $primary_address['provinsi'] ?>, <?= $primary_address['kode_pos'] ?></p>
                    <?php endif; ?>
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
                <form action="product/checkout" id="checkout" method="post">
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
                    <div class="order-detail" style="margin-bottom: 15px">
                        <label for="payment">Metode Pembayaran</label>
                        <select name="payment" id="bayar" aria-placeholder="Pilih Pembayaran" style="color: grey;" required>
                            <option value="" disabled selected>Pilih Pembayaran</option>
                            <option value="bank">Transfer Bank</option>
                            <option value="ewallet">Transfer E-wallet</option>
                        </select>
                    </div>
                    <div class="order-detail" style="margin-bottom: 15px">
                        <label for="ongkir">Metode Pengiriman</label>
                        <select name="ongkir" id="ongkir" aria-placeholder="Pilih Pengiriman" style="color: grey;" onchange="changeong();" required>
                            <option value="" disabled selected>Pilih Pengiriman</option>
                            <option value="12000">Normal - Rp12.000</option>
                            <option value="15000">Kargo - Rp15.000</option>
                            <option value="35000">Next Day - Rp35.000</option>
                            <option value="50000">Same Day - Rp50.000</option>
                        </select>
                    </div>
                    <button type="submit" for="checkout" class="payment-button">Checkout</button>
                </form>
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
        let selected = parseInt(selectbox.options[selectbox.selectedIndex].value);
        
        ongkir = selected;
        let totalBelanja = total + ongkir + asuransi + proteksi;

        document.getElementById('hargaOngkir').innerHTML = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(ongkir);
        document.getElementById('totalBelanja').innerHTML = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalBelanja);
    }
</script>
