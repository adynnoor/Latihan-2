<?php
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json; charset=utf-8');

function balas(int $kode, bool $sukses, string $pesan): void
{
    http_response_code($kode);
    echo json_encode(['sukses' => $sukses, 'pesan' => $pesan]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    balas(405, false, 'Metode tidak diizinkan.');
}

if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
    balas(403, false, 'Sesi tidak valid, silakan muat ulang halaman.');
}

$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$isi   = trim($_POST['isi'] ?? '');

if ($nama === '' || $email === '' || $isi === '') {
    balas(422, false, 'Semua kolom wajib diisi.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    balas(422, false, 'Format email tidak valid.');
}
if (mb_strlen($nama) > 100 || mb_strlen($email) > 150 || mb_strlen($isi) > 2000) {
    balas(422, false, 'Isian terlalu panjang.');
}

$tersimpan = simpan_pesan([
    'nama'    => $nama,
    'email'   => $email,
    'isi'     => $isi,
    'waktu'   => date('Y-m-d H:i:s'),
]);

if (!$tersimpan) {
    balas(500, false, 'Gagal menyimpan pesan. Coba lagi nanti.');
}

balas(200, true, 'Terima kasih, ' . $nama . '! Pesan Anda sudah terkirim.');
