<?php
$judul = 'Pesan Masuk - Latihan Web';
require __DIR__ . '/includes/header.php';

$daftar = array_reverse(baca_pesan());
?>

<section class="section">
    <div class="container">
        <h2>Pesan Masuk (<?= count($daftar) ?>)</h2>
        <?php if (!$daftar): ?>
            <p>Belum ada pesan.</p>
        <?php else: ?>
            <div class="tabel-wrap">
                <table class="tabel">
                    <thead>
                    <tr><th>Waktu</th><th>Nama</th><th>Email</th><th>Pesan</th></tr>
                    </thead>
                    <tbody>
                    <?php foreach ($daftar as $p): ?>
                        <tr>
                            <td><?= e($p['waktu']) ?></td>
                            <td><?= e($p['nama']) ?></td>
                            <td><?= e($p['email']) ?></td>
                            <td><?= nl2br(e($p['isi'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
