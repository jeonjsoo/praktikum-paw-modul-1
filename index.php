<?php

// Data produk Cia Store
$produk = [
    [
        "nama" => "Laptop ASUS VivoBook",
        "kategori" => "Laptop",
        "harga" => 7500000,
        "stok" => 5
    ],
    [
        "nama" => "Mouse Logitech M331",
        "kategori" => "Aksesoris",
        "harga" => 250000,
        "stok" => 10
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "Aksesoris",
        "harga" => 850000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Razer Kraken",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 7
    ],
    [
        "nama" => "Monitor Samsung 24 Inch",
        "kategori" => "Monitor",
        "harga" => 2200000,
        "stok" => 4
    ],
    [
        "nama" => "Webcam Logitech C920",
        "kategori" => "Aksesoris",
        "harga" => 950000,
        "stok" => 8
    ]
];

// Menghitung jumlah produk
$jumlahProduk = count($produk);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cia Store | Katalog Produk</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="container navbar-content">

            <h1 class="logo">Cia Store<span></span></h1>

            <nav>
                <a href="#home">Home</a>
                <a href="#produk">Produk</a>
            </nav>

        </div>
    </header>

    <!-- Hero Section -->
    <main>

        <section class="hero" id="home">
            <div class="container">

                <p class="hero-label">WELCOME TO CIA STORE</p>

                <h2>Temukan Perangkat Teknologi Favoritmu</h2>

                <p class="hero-description">
                    Berbagai perangkat dan aksesoris teknologi tersedia
                    untuk memenuhi kebutuhan digitalmu.
                </p>

                <a href="#produk" class="hero-button">
                    Lihat Produk
                </a>

            </div>
        </section>

        <!-- Katalog Produk -->
        <section class="product-section" id="produk">

            <div class="container">

                <div class="section-heading">

                    <div>
                        <p class="section-label">KOLEKSI KAMI</p>
                        <h2>Katalog Produk</h2>
                    </div>

                    <div class="product-count">
                        Total Produk:
                        <strong><?= $jumlahProduk; ?></strong>
                    </div>

                </div>

                <!-- Daftar Produk -->
                <div class="product-grid">

                    <?php foreach ($produk as $item) : ?>

                        <?php
                        // Menentukan status stok
                        if ($item["stok"] > 0) {
                            $status = "Tersedia";
                            $statusClass = "available";
                        } else {
                            $status = "Stok Habis";
                            $statusClass = "sold-out";
                        }

                        // Menghitung diskon
                        $diskon = 0;

                        if ($item["harga"] >= 1000000) {
                            $diskon = 10;
                        }

                        $hargaDiskon = $item["harga"] - ($item["harga"] * $diskon / 100);
                        ?>

                        <article class="product-card">

                            <div class="product-info">

                                <p class="product-category">
                                    <?= htmlspecialchars($item["kategori"]); ?>
                                </p>

                                <h3>
                                    <?= htmlspecialchars($item["nama"]); ?>
                                </h3>

                                <!-- Harga Produk -->
                                <div class="product-price">

                                    <?php if ($diskon > 0) : ?>

                                        <span class="discount-badge">
                                            Diskon <?= $diskon; ?>%
                                        </span>

                                        <p class="normal-price">
                                            Rp<?= number_format($item["harga"], 0, ',', '.'); ?>
                                        </p>

                                        <p class="discount-price">
                                            Rp<?= number_format($hargaDiskon, 0, ',', '.'); ?>
                                        </p>

                                    <?php else : ?>

                                        <p class="discount-price">
                                            Rp<?= number_format($item["harga"], 0, ',', '.'); ?>
                                        </p>

                                    <?php endif; ?>

                                </div>

                                <!-- Status Stok dan Tombol -->
                                <div class="product-footer">

                                    <span class="stock-status <?= $statusClass; ?>">
                                        <?= $status; ?>
                                    </span>

                                    <?php if ($item["stok"] > 0) : ?>

                                        <button class="buy-button" type="button">
                                            Beli Sekarang
                                        </button>

                                    <?php else : ?>

                                        <button class="buy-button disabled" type="button" disabled>
                                            Stok Habis
                                        </button>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; Cia Store.</p>
        </div>
    </footer>

</body>

</html>