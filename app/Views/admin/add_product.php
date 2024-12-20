<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>
        <main class="main-content">
            <section class="add-product">
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
                    <input type="file" name="img" id="img" accept="image/*">
                    <button type="submit" class="add-button">Tambah Produk</button>

                    <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" style="color: green">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                </form>
            </section>
        </main>
<?= $this->endSection(); ?>