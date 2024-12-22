<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>
                <nav class="menu">
                <a href="dashboard" class="menu-item">Dashboard</a>
                <a href="productmanager" class="menu-item active">Tambah Produk</a>
                <a href="product-list" class="menu-item">Daftar Produk</a>
                <a href="#" class="menu-item">Daftar Pesanan</a>
                <a href="#" class="menu-item">Pengaturan</a>
            </nav>
        </aside>
        <main class="main-content">
            <section class="add-product">
                 <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" style="color: green">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('product/addproduct'); ?>" method="post" enctype="multipart/form-data">
                <?php csrf_field() ?>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama produk" required>
                    <input type="number" id="price" name="price" placeholder="Masukkan harga produk" required>
                    <input type="number" id="stock" name="stock" placeholder="Masukkan stock produk" required>
                    <input type="text" id="description" name="description" placeholder="Masukkan deskripsi produk" maxlength="255" required>
                    <select name="kategori" id="kategori" aria-placeholder="pilih kategori" style="color: grey;">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <?php foreach($categories as $c) : ?>
                            <option value="<?= $c['category_id']; ?>"><?= $c['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="file" name="imgInp" id="imgInp" accept="image/*">
                    <div class="image-preview" id="image-preview">
                        <img class="blah" id="blah">
                    </div>
                    <script>
                        imgInp.onchange = evt => {
                    const [file] = imgInp.files
                    if (file) {
                        blah.src = URL.createObjectURL(file)
                        }
                    }
                    </script>
                    <button type="submit" class="add-button">Tambah Produk</button>
                </form>
            </section>
        </main>
<?= $this->endSection(); ?>