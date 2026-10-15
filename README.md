# Latihan Web (HTML, CSS, JS & PHP)

Website sederhana berisi landing page dan form kontak yang disimpan oleh PHP.

## Struktur

```
├── index.php            # Halaman utama (beranda, tentang, layanan, kontak)
├── kontak.php           # Memproses form kontak (validasi + simpan), membalas JSON
├── pesan.php            # Menampilkan daftar pesan masuk
├── includes/
│   ├── config.php       # Konfigurasi, fungsi bantu, CSRF, baca/simpan pesan
│   ├── header.php       # Bagian atas halaman + navbar
│   └── footer.php       # Bagian bawah halaman
├── assets/
│   ├── css/style.css    # Tampilan & responsif
│   └── js/script.js     # Menu mobile, animasi, kirim form via fetch (AJAX)
└── data/                # Tempat file pesan.json (dibuat otomatis)
```

## Cara Menjalankan

Butuh PHP 7.4 atau lebih baru.

```bash
php -S localhost:8000
```

Lalu buka http://localhost:8000 di browser.

Jika memakai XAMPP/Laragon, salin folder ini ke `htdocs`/`www`, lalu buka
`http://localhost/Latihan-2`. Pastikan folder `data/` bisa ditulis oleh server.

## Catatan

- Halaman `pesan.php` belum dilindungi login — tambahkan autentikasi sebelum dipakai publik.
- Pesan disimpan di `data/pesan.json`; bisa diganti ke database MySQL bila diperlukan.
