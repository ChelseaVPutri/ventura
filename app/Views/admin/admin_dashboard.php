<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
        <main class="main-content">
            <section class="stats">
                <div class="stat-card">
                    <p>Total Produk</p>
                    <h2><?= $total_product; ?></h2>
                </div>
                <div class="stat-card">
                    <p>Produk Terjual / tahun</p>
                    <h2>491</h2>
                </div>
            </section>
            <section class="order-stats">
                <div class="order-card">Pesanan Baru <span>49</span></div>
                <div class="order-card">Sedang Diproses <span>24</span></div>
                <div class="order-card">Siap Dikirim <span>30</span></div>
                <div class="order-card">Pesanan Selesai <span>22</span></div>
            </section>
        </main>
<?= $this->endSection() ?>