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
        <h1 style="color: #e74c3c"><?= $title; ?></h1>
    </header>
    <div class="container">
        <aside class="sidebar">
            <div class="user-info">
                <p class="user-name"><?= $user['username']; ?></p>
                <p class="user-email">ID admin: <?= $user['admin_id']; ?></p>
            </div>
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