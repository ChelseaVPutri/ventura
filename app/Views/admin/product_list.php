<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>
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
