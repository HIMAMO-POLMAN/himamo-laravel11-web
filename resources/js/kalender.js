
// =====================================
// KALENDER KEGIATAN HIMAMO
// =====================================

function initKalender() {

    // Mengambil elemen HTML
    const namaBulan = document.getElementById('namaBulan');
    const kalenderTanggal = document.getElementById('kalenderTanggal');

    const tombolSebelumnya = document.getElementById('bulanSebelumnya');
    const tombolBerikutnya = document.getElementById('bulanBerikutnya');
    const tombolHariIni = document.getElementById('bulanSekarang');

    // Berhenti jika halaman tidak memiliki kalender
    if (
    !namaBulan ||
    !kalenderTanggal ||
    !tombolSebelumnya ||
    !tombolBerikutnya ||
    !tombolHariIni
) {
    console.error('Elemen kalender yang tidak ditemukan:');

    if (!namaBulan) console.error('namaBulan');
    if (!kalenderTanggal) console.error('kalenderTanggal');
    if (!tombolSebelumnya) console.error('bulanSebelumnya');
    if (!tombolBerikutnya) console.error('bulanBerikutnya');
    if (!tombolHariIni) console.error('bulanSekarang');

    return;
}

    // Tanggal saat ini
    const hariIni = new Date();

    let bulanAktif = hariIni.getMonth();
    let tahunAktif = hariIni.getFullYear();

    const namaBulanIndonesia = [
        'Januari', 'Februari', 'Maret',
        'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember'
    ];

    // Format tanggal YYYY-MM-DD
    function formatTanggal(tanggal) {
        const tahun = tanggal.getFullYear();
        const bulan = String(tanggal.getMonth() + 1).padStart(2, '0');
        const hari = String(tanggal.getDate()).padStart(2, '0');

        return `${tahun}-${bulan}-${hari}`;
    }

    // Mengambil data kegiatan dari Laravel
    const daftarKegiatan = window.kegiatanHimamo || [];

    // Mencari kegiatan berdasarkan tanggal
    function cariKegiatan(tanggal) {
        return daftarKegiatan.filter(function (kegiatan) {
            const tanggalMulai = kegiatan.tanggal_mulai;
            const tanggalSelesai =
                kegiatan.tanggal_selesai || tanggalMulai;

            return tanggal >= tanggalMulai &&
                   tanggal <= tanggalSelesai;
        });
    }

    // Membuat kalender
    function tampilkanKalender() {

        namaBulan.textContent =
            `${namaBulanIndonesia[bulanAktif]} ${tahunAktif}`;

        kalenderTanggal.innerHTML = '';

        const tanggalPertama = new Date(tahunAktif, bulanAktif, 1);

        const jumlahHari = new Date(
            tahunAktif,
            bulanAktif + 1,
            0
        ).getDate();

        // Senin = 0, Minggu = 6
        const posisiHariPertama =
            (tanggalPertama.getDay() + 6) % 7;

        const jumlahKotak =
            Math.ceil((posisiHariPertama + jumlahHari) / 7) * 7;

        const tanggalAwal = new Date(
            tahunAktif,
            bulanAktif,
            1 - posisiHariPertama
        );

        // Membuat kotak tanggal
        for (let i = 0; i < jumlahKotak; i++) {

            const tanggal = new Date(tanggalAwal);
            tanggal.setDate(tanggalAwal.getDate() + i);

            const cell = document.createElement('div');
            cell.classList.add('kalender-cell');

            if (tanggal.getMonth() !== bulanAktif) {
                cell.classList.add('luar-bulan');
            }

            const nomorTanggal = document.createElement('div');
            nomorTanggal.classList.add('tanggal-number');
            nomorTanggal.textContent = tanggal.getDate();

            // Menandai hari ini
            if (formatTanggal(tanggal) === formatTanggal(hariIni)) {
                nomorTanggal.classList.add('hari-ini');
            }

            if (kegiatanTanggal.length > 0) {
            cell.classList.add('ada-kegiatan');

            const daftarJudul = document.createElement('div');
            daftarJudul.classList.add('kegiatan-list');

            kegiatanTanggal.forEach(function (kegiatan) {
                const item = document.createElement('div');
                item.classList.add('kegiatan-item');

                item.textContent = kegiatan.judul;
                item.title = kegiatan.judul;

                daftarJudul.appendChild(item);
            });

            cell.appendChild(daftarJudul);
        }

        kalenderTanggal.appendChild(cell);
        }
    }

    // Tombol bulan sebelumnya
    tombolSebelumnya.addEventListener('click', function () {

        bulanAktif--;

        if (bulanAktif < 0) {
            bulanAktif = 11;
            tahunAktif--;
        }

        tampilkanKalender();
    });

    // Tombol bulan berikutnya
    tombolBerikutnya.addEventListener('click', function () {

        bulanAktif++;

        if (bulanAktif > 11) {
            bulanAktif = 0;
            tahunAktif++;
        }

        tampilkanKalender();
    });

    // Tombol hari ini
    tombolHariIni.addEventListener('click', function () {

        bulanAktif = hariIni.getMonth();
        tahunAktif = hariIni.getFullYear();

        tampilkanKalender();
    });

    // Tampilkan kalender pertama kali
    tampilkanKalender();
}

// Jalankan setelah HTML selesai dibaca browser
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initKalender);
} else {
    initKalender();
}
