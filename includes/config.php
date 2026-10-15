<?php
// Konfigurasi dasar website
session_start();

define('NAMA_SITUS', 'Latihan Web');
define('FILE_PESAN', __DIR__ . '/../data/pesan.json');

// Escape output agar aman dari XSS
function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, 'UTF-8');
}

// Token CSRF untuk form
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function baca_pesan(): array
{
    if (!file_exists(FILE_PESAN)) {
        return [];
    }
    $data = json_decode(file_get_contents(FILE_PESAN), true);
    return is_array($data) ? $data : [];
}

function simpan_pesan(array $pesan): bool
{
    $semua = baca_pesan();
    $semua[] = $pesan;
    return file_put_contents(FILE_PESAN, json_encode($semua, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX) !== false;
}
