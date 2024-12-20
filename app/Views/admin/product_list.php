<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>
            <nav class="menu">
                <a href="dashboard" class="menu-item">Dashboard</a>
                <a href="productmanager" class="menu-item">Tambah Produk</a>
                <a href="product-list" class="menu-item active">Daftar Produk</a>
                <a href="#" class="menu-item">Daftar Pesanan</a>
                <a href="#" class="menu-item">Pengaturan</a>
            </nav>
        </aside>
        <main class="main-content">
            <?php 
            if(!empty($errors)){
                foreach ($errors as $error) {
                    echo $error;
                }
            }
            ?>
            <section class="product-list">
                <?php foreach($dataproduk as $p) : ?>
                <div class="product-card">
                    <img src="<?= ASSET. $p['img']; ?>" alt="Product Image">
                    <div class="product-info">
                        <p><?= $p['name']; ?></p>
                        <p class="price" style="color: #EA6932;">Rp<?= number_format($p['price'], 0, ',', '.'); ?></p>
                        <div class="product-actions">
                            <a href="../Product/delproduct/<?= $p['product_id']; ?>"><button class="delete-button">Hapus</button></a>
                            <a href="<?= base_url('admin/product/detail/'.$p['product_id']); ?>"><button class="view-button">Lihat</button></a>
                            <button class="stock-button">stock</button>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </section>
        </main>
<?= $this->endSection(); ?>
