<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($judul ?? NAMA_SITUS) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="navbar">
    <div class="container nav-inner">
        <a href="index.php" class="logo"><?= e(NAMA_SITUS) ?></a>
        <button class="nav-toggle" aria-label="Buka menu">&#9776;</button>
        <nav class="nav-menu">
            <a href="index.php#beranda">Beranda</a>
            <a href="index.php#tentang">Tentang</a>
            <a href="index.php#layanan">Layanan</a>
            <a href="index.php#kontak">Kontak</a>
            <a href="pesan.php">Pesan Masuk</a>
        </nav>
    </div>
</header>
<main>
