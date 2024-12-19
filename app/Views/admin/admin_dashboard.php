<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= CSS . "admin_dashboard.css" ?>">
</head>

<body>
    <header>
        <button class="back-button">←</button>
        <h1>Dashboard</h1>
    </header>
    <div class="container">
        <aside class="sidebar">
            <div class="user-info">
                <p class="user-name"><?= $user['username']; ?></p>
                <p class="user-email"><?= $user['admin_id']; ?></p>
            </div>
            <nav class="menu">
                <a href="#" class="menu-item active">Dashboard</a>
                <a href="product-manager" class="menu-item">Tambah Produk</a>
                <a href="product-list" class="menu-item">Daftar Produk</a>
                <a href="#" class="menu-item">Daftar Pesanan</a>
                <a href="#" class="menu-item">Pengaturan</a>
            </nav>
        </aside>
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
        <aside class="highlights">
            <h2>Highlight</h2>
            <p>Produk Terlaris Bulan Ini!</p>
            <div class="highlight-item">
                <img src="chair.png" alt="Product">
                <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi Kerja 800 Abu - 800 Abu</p>
                <span>Terjual sebanyak 54</span>
            </div>
            <div class="highlight-item">
                <img src="chair.png" alt="Product">
                <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi Kerja 800 Abu - 800 Abu</p>
                <span>Terjual sebanyak 54</span>
            </div>
        </aside>
    </div>
</body>
</html>
