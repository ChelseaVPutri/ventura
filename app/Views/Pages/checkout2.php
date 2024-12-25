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
                    <button id="myButton" class="shipping-button">Ganti Alamat</button>
                    <div id="popupContainer" class="popup">
                        <div class="address-box">
                            <button class="close-button2" id="closePopup">Tutup</button>
                            <h1>Ganti Alamat</h1>
                            <div class="address-details">
                                <div class="name-and-phone">
                                    <h2 style="margin-right: 15px"><?= $primary_address['nama'] ?></h2>
                                    <p style="margin-right: 15px"><?= $primary_address['telepon'] ?></p>
                                    <button
                                        id="myButton2"
                                        class="edit-button"
                                        data-name="<?= $primary_address['nama'] ?>"
                                        data-phone="<?= $primary_address['telepon'] ?>"
                                        data-address="<?= $primary_address['alamat_lengkap'] ?>"
                                        data-kelurahan="<?= $primary_address['kelurahan'] ?>"
                                        data-kecamatan="<?= $primary_address['kecamatan'] ?>"
                                        data-kota="<?= $primary_address['kota_kabupaten'] ?>"
                                        data-provinsi="<?= $primary_address['provinsi']; ?>"
                                        data-kodepos="<?= $primary_address['kode_pos']; ?>">
                                    Ubah</button>
                                    <!-- <button id="myButton2" class="edit-button" style="font-weight: bold">Ubah</button> -->

                                    <div id="popupContainer2" class="popup">
                                        <div class="edit-address-box">
                                            <h1>Ubah Alamat</h1>
                                            <form id="editAddressForm" action="<?= base_url('/update-primary-address') ?>" method="post">
                                                <input type="hidden" name="alamat_id" id="alamat_id" />
                                                <input type="hidden" name="user_id" value="<?= session()->get('user_id'); ?>" />

                                                <div class="input-group">
                                                    <input type="text" id="popupName" />
                                                    <input type="text" id="popupPhone" />
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" id="popupProvinsi"  />
                                                    <input type="text" id="popupKota"  />
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" id="popupKelurahan"  />
                                                    <input type="text" id="popupKecamatan"  />
                                                    <input type="text" id="popupKodepos"  />
                                                </div>
                                                <textarea id="popupAddress"></textarea>
                                                <div class="button-group">
                                                    <button id="closePopup2" type="button" class="back-button-box">Kembali</button>
                                                    <button type="submit" class="ok-button-box" id="saveChanges">Simpan</but>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <p><?= $primary_address['alamat_lengkap'] ?></p>
                                <!-- <p>jalan inpres no.40b, kebon pala, makasar jakarta timur, Makasar, Jakarta Timur, DKI Jakarta, 6281234567891</p> -->
                                 <p><?= $primary_address['kecamatan'] ?>, <?= $primary_address['kota_kabupaten'] ?>, <?= $primary_address['provinsi'] ?>, <?= $primary_address['kode_pos'] ?></p>
                                <!-- <p>MAKASAR, KOTA JAKARTA TIMUR, DKI JAKARTA, ID, 13650</p> -->
                            </div>

                            <button id="myButton3" class="add-address-button">+ Tambah Alamat Baru</button>
                            <div id="popupContainer3" class="popup">
                                <div class="edit-address-box">
                                    <h1>Tambah Alamat</h1>
                                    <form>
                                        <div class="input-group">
                                            <input type="text" placeholder="Nama Lengkap" />
                                            <input type="text" placeholder="Nomor Telefon" />
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="Provinsi"  />
                                            <input type="text" placeholder="Kota"  />
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="Kecamatan"  />
                                            <input type="text" placeholder="Kelurahan"  />
                                            <input type="text" placeholder="Kode Pos"  />
                                        </div>
                                        <textarea placeholder="Nama Jalan (Detail Alamat)"></textarea>
                                        <div class="button-group">
                                            <button id="closePopup3" type="button" class="back-button-box">Kembali</button>
                                            <button type="submit" class="ok-button-box">OK</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
    document.getElementById('myButton').addEventListener('click', function() {
        document.getElementById('popupContainer').classList.add('show');
    });

    document.getElementById('closePopup').addEventListener('click', function () {
        document.getElementById('popupContainer').classList.remove('show');
    });

    // document.getElementById('myButton2').addEventListener('click', function () {
    //     document.getElementById('popupContainer2').classList.add('show');
    // });

    document.getElementById('closePopup2').addEventListener('click', function () {
        document.getElementById('popupContainer2').classList.remove('show');
    });

    document.getElementById('myButton3').addEventListener('click', function () {
        document.getElementById('popupContainer3').classList.add('show');
    });

    document.getElementById('closePopup3').addEventListener('click', function () {
        document.getElementById('popupContainer3').classList.remove('show');
    });

    const buttonEdit = document.getElementById('myButton2');
    const popupContainer2 = document.getElementById('popupContainer2');
    const primaryAddress = {
        name: buttonEdit.getAttribute('data-name'),
        phone: buttonEdit.getAttribute('data-phone'),
        address: buttonEdit.getAttribute('data-address'),
        kelurahan:buttonEdit.getAttribute('data-kelurahan'),
        kecamatan: buttonEdit.getAttribute('data-kecamatan'),
        kota: buttonEdit.getAttribute('data-kota'),
        provinsi: buttonEdit.getAttribute('data-provinsi'),
        kodepos: buttonEdit.getAttribute('data-kodepos'),
    };

    buttonEdit.addEventListener('click', function() {
        
        document.getElementById('popupName').value = primaryAddress.name;
        document.getElementById('popupPhone').value = primaryAddress.phone;
        document.getElementById('popupProvinsi').value = primaryAddress.provinsi;
        document.getElementById('popupKota').value = primaryAddress.kota;
        document.getElementById('popupKecamatan').value = primaryAddress.kecamatan;
        document.getElementById('popupKelurahan').value = primaryAddress.kelurahan;
        document.getElementById('popupKodepos').value = primaryAddress.kodepos;
        document.getElementById('popupAddress').value = primaryAddress.address;
        popupContainer2.classList.add('show');
    });

    document.getElementById('saveChanges').addEventListener('click', function() {
        primaryAddress.name = document.getElementById('popupName').value;
        primaryAddress.phone = document.getElementById('popupPhone').value;
        primaryAddress.provinsi = document.getElementById('popupProvinsi').value;
        primaryAddress.kota = document.getElementById('popupKota').value;
        primaryAddress.kecamatan = document.getElementById('popupKecamatan').value;
        primaryAddress.kelurahan = document.getElementById('popupKelurahan').value;
        primaryAddress.kodepos = document.getElementById('popupKodepos').value;
        primaryAddress.address = document.getElementById('popupAddress').value;

        document.querySelector('.name-and-phone h2').textContent = primaryAddress.name;
        document.querySelector('.name-and-phone span').textContent = primaryAddress.phone;
        popupContainer2.classList.remove('show');
    });

    document.getElementById('editAddressForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var name = document.getElementById('popupName').value;
        var phone = document.getElementById('popupPhone').value;
        var address = document.getElementById('popupAddress').value;
        var kelurahan =document.getElementById('popupKelurahan').value;
        var kecamatan = document.getElementById('popupKecamatan').value;
        var kota = document.getElementById('popupKota').value;
        var provinsi = document.getElementById('popupProvinsi').value;
        var kodepos = document.getElementById('popupKodepos').value;

        fetch('/update-primary-address', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user_id: userId,
                nama: name,
                telepon: phone,
                provinsi: provinsi,
                kota_kabupaten: kota,
                kecamatan: kecamatan,
                kelurahan: kelurahan,
                kode_pos: kodepos,
                alamat_lengkap: address,
                is_primary: true
            })
        })
        .then(response => {
            if(response.ok)  {
                document.getElementById('myButton2').setAttribute('data-name', name);
                document.getElementById('myButton2').setAttribute('data-phone', phone);
                document.getElementById('myButton2').setAttribute('data-address', address);
                document.getElementById('myButton2').setAttribute('data-kelurahan', kelurahan);
                document.getElementById('myButton2').setAttribute('data-kecamatan', kecamatan);
                document.getElementById('myButton2').setAttribute('data-kota', kota);
                document.getElementById('myButton2').setAttribute('data-provinsi', provinsi);
                document.getElementById('myButton2').setAttribute('data-kodepos', kodepos);

                document.getElementById('editAddressForm').action = `<?= base_url('/update-primary-address') ?>`;

                var popup = document.getElementById('popupContainer2');
                popup.classList.remove('show');
            } else {
                console.error('Gagal memperbarui alamat primary');
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
        })
    });

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
