<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= CSS . $css . ".css" ?>">
</head>

<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <div class="container">
        <aside class="sidebar">
            <div class="user-info">
                <p class="user-name"><?= $user['username']; ?></p>
                <p class="user-email"><?= $user['admin_id']; ?></p>
            </div>
            <nav class="menu">
                <a href="dashboard" class="menu-item active">Dashboard</a>
                <a href="productmanager" class="menu-item">Tambah Produk</a>
                <a href="product-list" class="menu-item">Daftar Produk</a>
                <a href="#" class="menu-item">Daftar Pesanan</a>
                <a href="#" class="menu-item">Pengaturan</a>
            </nav>
        </aside>
            <?= $this->renderSection('content') ?>
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