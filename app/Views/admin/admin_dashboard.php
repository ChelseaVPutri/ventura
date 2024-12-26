<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
                <nav class="menu">
                <a href="dashboard" class="menu-item active">Dashboard</a>
                <a href="productmanager" class="menu-item">Tambah Produk</a>
                <a href="product-list" class="menu-item">Daftar Produk</a>
                <a href="order-list" class="menu-item">Daftar Pesanan</a>
                <a href="logout" class="menu-item">Logout</a>
            </nav>
        </aside>
        <main class="main-content">
            <section class="stats">
                <div class="stat-card">
                    <p>Total Produk</p>
                    <h2><?= $total_product; ?></h2>
                </div>
                <div class="stat-card">
                    <p>Produk Terjual</p>
                    <h2>2</h2>
                </div>
            </section>
            <section class="order-stats">
                <!-- <div class="order-card">Pesanan Baru <span>49</span></div>
                <div class="order-card">Sedang Diproses <span>24</span></div>
                <div class="order-card">Siap Dikirim <span>30</span></div>
                <div class="order-card">Pesanan Selesai <span>22</span></div> -->
            </section>
        </main>
<?= $this->endSection() ?>