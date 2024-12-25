<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alamat</title>
    <link rel="icon" href="<?= ASSET . 'logo.png'; ?>">
    <link rel="stylesheet" href="<?= CSS . 'daftar-alamat.css' ?>">
</head>
<style>
    .primary-label {
    background-color: #ff9900;
    color: white;
    padding: 5px 10px;
    font-weight: bold;
    border-radius: 5px;
    position: absolute;
    top: 10px;
    right: 10px;
    }
</style>
<body>
    <header>
        <a href="<?= base_url('/profile'); ?>">
            <button class="back-button">←</button>
        </a>
        <h1>Daftar Alamat</h1>
    </header>

    <div class="container">
        <?php if(empty($alamat)): ?>
            <p>Alamat Kosong</p>
        <?php else: ?>
            <?php foreach ($alamat as $a): ?>
                <div class="address-item">
                    <div class="address-header">
                        <h2><?= esc($a['nama']) ?></h2>
                        <span><?= esc($a['telepon']) ?></span>
                    </div>
                    <div class="address-body">
                        <?= esc($a['alamat_lengkap']) ?> </br>
                        <?= esc($a['kecamatan']) ?>, <?= esc($a['kota_kabupaten'])?>, <?= esc($a['provinsi'])?>, <?= esc($a['kode_pos'])?>
                    </div>
                    <div class="address-actions">
                        <button class="edit-button" data-alamat-id="<?= $a['alamat_id']; ?>">Ubah</button>
                        <form action="<?= base_url('address/delete/' . $a['alamat_id']) ?>" method="post">
                            <?php csrf_field() ?>
                            <button class="delete-button">Hapus</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif;?>

    <button class="add-button" id="addAddressButton">Tambah Alamat Baru</button>

    <form action="<?= base_url('/address/add-address'); ?>" method="post">
        <div class="popup" id="popupContainer">
            <div class="popup-content">
                <h2>Tambah Alamat</h2>
                <?php csrf_field() ?>
                <input type="text" placeholder="Nama Lengkap" name="nama" required>
                <input type="text" placeholder="Nomor Telepon" name="phone" required>
                <input type="text" placeholder="Provinsi" name="provinsi" required>
                <input type="text" placeholder="Kota/Kabupaten" name="kota_kab" required>
                <input type="text" placeholder="Kecamatan" name="kecamatan" required>
                <input type="text" placeholder="Kelurahan" name="kelurahan" required>
                <input type="text" placeholder="Kode Pos" name="kode_pos" required>
                <textarea placeholder="Nama Jalan (Detail Alamat)" name="alamat_lengkap" required></textarea>
                <div class="popup-actions">
                    <button class="cancel" id="cancelButton">Kembali</button>
                    <button class="ok" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <form action="" id="editForm" method="post">
        <div class="popup" id="popupContainer2">
            <div class="popup-content">
                <h2>Edit Alamat</h2>
                <?php csrf_field() ?>
                <input type="hidden" name="alamat_id" id="alamat_id">
                <input type="text" placeholder="Nama Lengkap" name="nama" id="nama" required>
                <input type="text" placeholder="Nomor Telepon" name="phone" id="phone" required>
                <input type="text" placeholder="Provinsi" name="provinsi" id="provinsi" required>
                <input type="text" placeholder="Kota/Kabupaten" name="kota_kab" id="kota_kab" required>
                <input type="text" placeholder="Kecamatan" name="kecamatan" id="kecamatan" required>
                <input type="text" placeholder="Kelurahan" name="kelurahan" id="kelurahan" required>
                <input type="text" placeholder="Kode Pos" name="kode_pos" id="kode_pos" required>
                <textarea placeholder="Nama Jalan (Detail Alamat)" name="alamat_lengkap" id="alamat_lengkap" required></textarea>
                <div class="popup-actions">
                    <button class="cancel" id="cancelEditButton" type="button">Kembali</button>
                    <button class="ok" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </form>
        
    </div>

</body>
<script>
        const popupContainer1 = document.getElementById('popupContainer');
        const popupContainer2 = document.getElementById('popupContainer2');
        const addAddressButton = document.getElementById('addAddressButton');
        const cancelButton = document.getElementById('cancelButton');
        const editButtons = document.querySelectorAll('.edit-button');
        const cancelEditButton = document.getElementById('cancelEditButton');

        addAddressButton.addEventListener('click', () => {
            popupContainer1.classList.add('active');
        });

        cancelButton.addEventListener('click', () => {
            popupContainer1.classList.remove('active');
        });

        // editButtons.forEach((button) => {
        //     button.addEventListener('click', () => {
        //         popupContainer2.classList.add('active');
        //     });
        // });

        editButtons.forEach((button) => {
            button.addEventListener('click', async (event) => {
                const alamatId = event.target.getAttribute('data-alamat-id');
                const response = await fetch(`<?= base_url('address/edit-address/') ?>/${alamatId}` );
                const alamat = await response.json();

                document.getElementById('alamat_id').value = alamat.alamat_id;
                document.getElementById('nama').value = alamat.nama || '';
                document.getElementById('phone').value = alamat.telepon || '';
                document.getElementById('provinsi').value = alamat.provinsi || '';
                document.getElementById('kota_kab').value = alamat.kota_kabupaten || '';
                document.getElementById('kecamatan').value = alamat.kecamatan || '';
                document.getElementById('kelurahan').value = alamat.kelurahan || '';
                document.getElementById('kode_pos').value = alamat.kode_pos || '';
                document.getElementById('alamat_lengkap').value = alamat.alamat_lengkap || '';

                editForm.action = `<?= base_url('address/update/') ?>/${alamatId}`;
                popupContainer2.classList.add('active');
            });
        });
        

        cancelEditButton.addEventListener('click', () => {
            popupContainer2.classList.remove('active');
        });
</script>