<?php
$judul = 'Beranda - Latihan Web';
require __DIR__ . '/includes/header.php';

$layanan = [
    ['ikon' => '💻', 'nama' => 'Pembuatan Website', 'desk' => 'Website responsif yang cepat dan mudah dikelola.'],
    ['ikon' => '📱', 'nama' => 'Aplikasi Mobile', 'desk' => 'Aplikasi Android & iOS sesuai kebutuhan bisnis.'],
    ['ikon' => '🎨', 'nama' => 'Desain UI/UX', 'desk' => 'Tampilan menarik dengan pengalaman pengguna terbaik.'],
];
?>

<section id="beranda" class="hero">
    <div class="container">
        <h1>Selamat Datang di <?= e(NAMA_SITUS) ?></h1>
        <p>Website sederhana yang dibangun menggunakan HTML, CSS, JavaScript, dan PHP.</p>
        <a href="#kontak" class="btn">Hubungi Kami</a>
    </div>
</section>

<section id="tentang" class="section">
    <div class="container">
        <h2>Tentang Kami</h2>
        <p>Kami adalah tim yang berfokus pada pengembangan solusi digital. Halaman ini adalah contoh
            struktur website dinamis: tampilan dengan HTML &amp; CSS, interaksi dengan JavaScript,
            dan pemrosesan data di server dengan PHP.</p>
    </div>
</section>

<section id="layanan" class="section section-alt">
    <div class="container">
        <h2>Layanan</h2>
        <div class="grid">
            <?php foreach ($layanan as $item): ?>
                <div class="card">
                    <div class="card-icon"><?= $item['ikon'] ?></div>
                    <h3><?= e($item['nama']) ?></h3>
                    <p><?= e($item['desk']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="kontak" class="section">
    <div class="container">
        <h2>Kontak</h2>
        <form id="form-kontak" class="form" action="kontak.php" method="post" novalidate>
            <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required maxlength="100">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required maxlength="150">

            <label for="isi">Pesan</label>
            <textarea id="isi" name="isi" rows="5" required maxlength="2000"></textarea>

            <button type="submit" class="btn">Kirim Pesan</button>
            <div id="notifikasi" class="notifikasi" role="status"></div>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
