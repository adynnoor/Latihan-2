// Toggle menu di layar kecil
const toggle = document.querySelector('.nav-toggle');
const menu = document.querySelector('.nav-menu');

toggle.addEventListener('click', () => menu.classList.toggle('buka'));
menu.querySelectorAll('a').forEach((link) =>
    link.addEventListener('click', () => menu.classList.remove('buka'))
);

// Animasi kartu saat muncul di layar
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('tampil');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });
document.querySelectorAll('.card').forEach((card) => observer.observe(card));

// Validasi & kirim form kontak tanpa reload (AJAX)
const form = document.getElementById('form-kontak');

if (form) {
    const notif = document.getElementById('notifikasi');
    const tombol = form.querySelector('button[type="submit"]');

    const tampilkan = (teks, sukses) => {
        notif.textContent = teks;
        notif.className = 'notifikasi ' + (sukses ? 'sukses' : 'gagal');
    };

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        let valid = true;
        form.querySelectorAll('input[required], textarea[required]').forEach((field) => {
            const ok = field.checkValidity() && field.value.trim() !== '';
            field.classList.toggle('invalid', !ok);
            if (!ok) valid = false;
        });
        if (!valid) {
            tampilkan('Mohon lengkapi semua kolom dengan benar.', false);
            return;
        }

        tombol.disabled = true;
        tombol.textContent = 'Mengirim...';

        try {
            const respon = await fetch(form.action, { method: 'POST', body: new FormData(form) });
            const hasil = await respon.json();
            tampilkan(hasil.pesan, hasil.sukses);
            if (hasil.sukses) form.reset();
        } catch (err) {
            tampilkan('Terjadi kesalahan jaringan. Coba lagi.', false);
        } finally {
            tombol.disabled = false;
            tombol.textContent = 'Kirim Pesan';
        }
    });
}
