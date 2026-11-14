
// =====================================
// KEGIATAN HIMAMO
// DAFTAR, TIMELINE, DAN KALENDER
// =====================================

function initKalender() {

    // =====================================
    // 1. MENGAMBIL ELEMEN HTML
    // =====================================

    const tombolTampilan = document.querySelectorAll('.tampilan-button');

    const tampilanDaftar = document.getElementById('tampilanDaftar');
    const tampilanTimeline = document.getElementById('tampilanTimeline');
    const tampilanKalender = document.getElementById('tampilanKalender');

    const daftarKegiatanHTML = document.getElementById('daftarKegiatan');
    const timelineKegiatanHTML = document.getElementById('timelineKegiatan');

    const filterKategori = document.getElementById('filterKategori');
    const inputPencarian = document.getElementById('cariKegiatan');

    const namaBulan = document.getElementById('namaBulan');
    const kalenderTanggal = document.getElementById('kalenderTanggal');

    const tombolSebelumnya = document.getElementById('bulanSebelumnya');
    const tombolBerikutnya = document.getElementById('bulanBerikutnya');
    const tombolHariIni = document.getElementById('bulanSekarang');

    // Periksa elemen utama
    if (
        !tampilanDaftar ||
        !tampilanTimeline ||
        !tampilanKalender ||
        !daftarKegiatanHTML ||
        !timelineKegiatanHTML ||
        !filterKategori ||
        !inputPencarian ||
        !namaBulan ||
        !kalenderTanggal
    ) {
        console.error('Elemen kegiatan tidak ditemukan.');
        return;
    }

    // =====================================
    // 2. MENGAMBIL DATA DARI LARAVEL
    // =====================================

    const daftarKegiatan = window.kegiatanHimamo || [];

    console.log('Data kegiatan HIMAMO:', daftarKegiatan);

    // =====================================
    // 3. VARIABEL KALENDER
    // =====================================

    const hariIni = new Date();

    let bulanAktif = hariIni.getMonth();
    let tahunAktif = hariIni.getFullYear();
    // Bulan aktif untuk Timeline
    let bulanTimeline = hariIni.getMonth();
    let tahunTimeline = hariIni.getFullYear();

    const namaBulanIndonesia = [
        'Januari', 'Februari', 'Maret',
        'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember'
    ];

    const namaHari = [
        'Minggu', 'Senin', 'Selasa',
        'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    ];

    // =====================================
    // 4. FUNGSI FORMAT TANGGAL
    // =====================================

    function formatTanggal(tanggal) {

        const tahun = tanggal.getFullYear();
        const bulan = String(tanggal.getMonth() + 1).padStart(2, '0');
        const hari = String(tanggal.getDate()).padStart(2, '0');

        return `${tahun}-${bulan}-${hari}`;
    }

    function formatTanggalIndonesia(tanggal) {

        const tanggalObjek = new Date(tanggal + 'T00:00:00');

        return tanggalObjek.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
    }

    function ambilTanggalSelesai(kegiatan) {
        return kegiatan.tanggal_selesai || kegiatan.tanggal_mulai;
    }

    // =====================================
    // 5. FILTER KATEGORI DAN PENCARIAN
    // =====================================

    function ambilKegiatanTerfilter() {

        const kategoriDipilih = filterKategori.value;
        const kataKunci = inputPencarian.value.toLowerCase().trim();

        return daftarKegiatan.filter(function (kegiatan) {

            const kategoriSesuai =
                kategoriDipilih === 'semua' ||
                kegiatan.kategori === kategoriDipilih;

            const judul = kegiatan.judul || '';
            const deskripsi = kegiatan.deskripsi || '';
            const lokasi = kegiatan.lokasi || '';

            const pencarianSesuai =
                judul.toLowerCase().includes(kataKunci) ||
                deskripsi.toLowerCase().includes(kataKunci) ||
                lokasi.toLowerCase().includes(kataKunci);

            return kategoriSesuai && pencarianSesuai;

        }).sort(function (a, b) {

            return a.tanggal_mulai.localeCompare(b.tanggal_mulai);

        });
    }

    // =====================================
    // 6. MENENTUKAN STATUS KEGIATAN
    // =====================================

    function tentukanStatus(kegiatan) {

        const tanggalSekarang = formatTanggal(hariIni);
        const tanggalMulai = kegiatan.tanggal_mulai;
        const tanggalSelesai = ambilTanggalSelesai(kegiatan);

        if (tanggalSekarang < tanggalMulai) {
            return 'Akan Datang';
        }

        if (tanggalSekarang > tanggalSelesai) {
            return 'Selesai';
        }

        return 'Berlangsung';
    }

    // =====================================
    // 7. MENGGANTI TAMPILAN
    // =====================================

    function gantiTampilan(tampilan) {

        tampilanDaftar.hidden = tampilan !== 'daftar';
        tampilanTimeline.hidden = tampilan !== 'timeline';
        tampilanKalender.hidden = tampilan !== 'kalender';

        tombolTampilan.forEach(function (tombol) {

            tombol.classList.toggle(
                'aktif',
                tombol.dataset.tampilan === tampilan
            );

        });

        if (tampilan === 'kalender') {
            tampilkanKalender();
        }
    }

    tombolTampilan.forEach(function (tombol) {

        tombol.addEventListener('click', function () {

            gantiTampilan(tombol.dataset.tampilan);

        });

    });

    // =====================================
    // 8. MENAMPILKAN DAFTAR KEGIATAN
    // =====================================

    function tampilkanDaftar() {

        const kegiatan = ambilKegiatanTerfilter();

        daftarKegiatanHTML.innerHTML = '';

        if (kegiatan.length === 0) {

            daftarKegiatanHTML.innerHTML = `
                <div class="kegiatan-kosong">
                    Tidak ada kegiatan yang ditemukan.
                </div>
            `;

            return;
        }

        kegiatan.forEach(function (item) {

            const kartu = document.createElement('div');
            kartu.classList.add('kegiatan-card');
            kartu.dataset.id = item.id;
            kartu.style.cursor = 'pointer';

            const kategori = item.kategori || 'Belum dikategorikan';

            const tanggalMulai = formatTanggalIndonesia(
                item.tanggal_mulai
            );

            const tanggalSelesai = formatTanggalIndonesia(
                ambilTanggalSelesai(item)
            );

            const status = tentukanStatus(item);

            kartu.innerHTML = `
                <div class="kegiatan-card-header">

                    <span class="kegiatan-kategori">
                        ${kategori}
                    </span>

                    <span class="kegiatan-status ${status.toLowerCase().replace(' ', '-')}">
                        ${status}
                    </span>

                </div>

                <h3></h3>

                <p class="kegiatan-deskripsi"></p>

                <div class="kegiatan-informasi">

                    <span>
                        📅 ${tanggalMulai}
                        ${tanggalMulai !== tanggalSelesai
                            ? ' - ' + tanggalSelesai
                            : ''}
                    </span>

                    <span class="kegiatan-lokasi"></span>

                </div>
            `;

            // Mengisi teks dengan aman
            kartu.querySelector('h3').textContent = item.judul;
            kartu.querySelector('.kegiatan-deskripsi').textContent =
                item.deskripsi || 'Tidak ada deskripsi kegiatan.';

            kartu.querySelector('.kegiatan-lokasi').textContent =
                item.lokasi ? '📍 ' + item.lokasi : '';

            daftarKegiatanHTML.appendChild(kartu);

        });
    }

    // =====================================
    // 9. MENAMPILKAN TIMELINE
    // =====================================

   
    function tampilkanTimeline() {

        const kegiatan = ambilKegiatanTerfilter();

        const namaBulanTimeline = document.getElementById(
            'namaBulanTimeline'
        );

        timelineKegiatanHTML.innerHTML = '';

        const jumlahHari = new Date(
            tahunTimeline,
            bulanTimeline + 1,
            0
        ).getDate();

        const awalBulan = new Date(
            tahunTimeline,
            bulanTimeline,
            1
        );

        const akhirBulan = new Date(
            tahunTimeline,
            bulanTimeline,
            jumlahHari
        );

        namaBulanTimeline.textContent =
            `${namaBulanIndonesia[bulanTimeline]} ${tahunTimeline}`;

        // Header tanggal
        const header = document.createElement('div');
        header.classList.add('timeline-grid');

        header.style.gridTemplateColumns =
            `180px repeat(${jumlahHari}, minmax(28px, 1fr))`;

        const kolomJudul = document.createElement('div');
        kolomJudul.classList.add('timeline-header-judul');
        kolomJudul.textContent = 'Kegiatan';

        header.appendChild(kolomJudul);

        for (let i = 1; i <= jumlahHari; i++) {

            const kolom = document.createElement('div');
            kolom.classList.add('timeline-header-tanggal');
            kolom.textContent = i;

            header.appendChild(kolom);
        }

        timelineKegiatanHTML.appendChild(header);

        // Filter kegiatan yang bersinggungan dengan bulan aktif
        const kegiatanBulan = kegiatan.filter(function (item) {

            const mulai = new Date(item.tanggal_mulai + 'T00:00:00');
            const selesai = new Date(
                ambilTanggalSelesai(item) + 'T00:00:00'
            );

            return mulai <= akhirBulan && selesai >= awalBulan;

        });

        if (kegiatanBulan.length === 0) {

            const kosong = document.createElement('div');
            kosong.classList.add('kegiatan-kosong');
            kosong.textContent =
                'Tidak ada kegiatan pada bulan ini.';

            timelineKegiatanHTML.appendChild(kosong);

            return;
        }

        // Membuat baris setiap kegiatan
        kegiatanBulan.forEach(function (item) {

            const baris = document.createElement('div');
            baris.classList.add('timeline-grid', 'timeline-row');

            baris.style.gridTemplateColumns =
                `180px repeat(${jumlahHari}, minmax(28px, 1fr))`;

            // Nama kegiatan
            const judul = document.createElement('div');
            judul.classList.add('timeline-row-judul');
            judul.textContent = item.judul;
            judul.title = item.judul;

            baris.appendChild(judul);

            // Area tanggal
            const area = document.createElement('div');
            area.classList.add('timeline-track');

            area.style.gridTemplateColumns =
                `repeat(${jumlahHari}, minmax(28px, 1fr))`;

            area.style.gridColumn = `2 / ${jumlahHari + 2}`;

            // Garis pembatas setiap tanggal
            for (let i = 1; i <= jumlahHari; i++) {

                const garis = document.createElement('div');
                garis.classList.add('timeline-track-cell');

                area.appendChild(garis);
            }

            // Menghitung posisi batang kegiatan
            const mulai = new Date(item.tanggal_mulai + 'T00:00:00');

            const selesai = new Date(
                ambilTanggalSelesai(item) + 'T00:00:00'
            );

            const tanggalMulai = mulai < awalBulan
                ? 1
                : mulai.getDate();

            const tanggalSelesai = selesai > akhirBulan
                ? jumlahHari
                : selesai.getDate();

            const posisiKiri =
                ((tanggalMulai - 1) / jumlahHari) * 100;

            const lebar =
                ((tanggalSelesai - tanggalMulai + 1) / jumlahHari) * 100;

            // Batang kegiatan
            const batang = document.createElement('div');
            batang.classList.add('timeline-bar');

            batang.style.left = `${posisiKiri}%`;
            batang.style.width = `${lebar}%`;

            batang.textContent = item.judul;
            batang.title =
                `${item.judul}: ${formatTanggalIndonesia(item.tanggal_mulai)} - ${formatTanggalIndonesia(ambilTanggalSelesai(item))}`;

            batang.dataset.id = item.id;

            const status = tentukanStatus(item);

            if (status === 'Berlangsung') {
                batang.classList.add('berlangsung');
            } else if (status === 'Selesai') {
                batang.classList.add('selesai');
            }

            area.appendChild(batang);

            baris.appendChild(area);

            // ID untuk membuka modal detail
            baris.dataset.id = item.id;
            baris.style.cursor = 'pointer';

            timelineKegiatanHTML.appendChild(baris);

        });

    }


    // =====================================
    // 10. MENAMPILKAN KALENDER
    // =====================================

    function cariKegiatan(tanggal) {

        return ambilKegiatanTerfilter().filter(function (kegiatan) {

            const tanggalMulai = kegiatan.tanggal_mulai;
            const tanggalSelesai = ambilTanggalSelesai(kegiatan);

            return tanggal >= tanggalMulai &&
                tanggal <= tanggalSelesai;

        });
    }

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

        const posisiHariPertama =
            (tanggalPertama.getDay() + 6) % 7;

        const jumlahKotak =
            Math.ceil((posisiHariPertama + jumlahHari) / 7) * 7;

        const tanggalAwal = new Date(
            tahunAktif,
            bulanAktif,
            1 - posisiHariPertama
        );

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

            if (formatTanggal(tanggal) === formatTanggal(hariIni)) {
                nomorTanggal.classList.add('hari-ini');
            }

            cell.dataset.date = formatTanggal(tanggal);
            cell.appendChild(nomorTanggal);

            const kegiatanTanggal = cariKegiatan(
                formatTanggal(tanggal)
            );

            if (kegiatanTanggal.length > 0) {

                cell.classList.add('ada-kegiatan');

                const daftarJudul = document.createElement('div');
                daftarJudul.classList.add('kegiatan-list');

                kegiatanTanggal.forEach(function (kegiatan) {

                    const item = document.createElement('div');
                    item.classList.add('kegiatan-item');

                    item.textContent = kegiatan.judul;
                    item.title = kegiatan.judul;

                    const status = tentukanStatus(kegiatan);

                    if (status === 'Berlangsung') {
                        item.classList.add('berlangsung');
                    } else if (status === 'Selesai') {
                        item.classList.add('selesai');
                    }

                    daftarJudul.appendChild(item);

                });

                cell.appendChild(daftarJudul);
            }

            kalenderTanggal.appendChild(cell);

        }
    }


    // =====================================
    // MODAL DETAIL KEGIATAN
    // =====================================

    const modalDetail = document.getElementById('modalDetailKegiatan');

    const tombolTutupModal = document.getElementById('tutupModalKegiatan');

    const overlayModal = modalDetail?.querySelector(
        '.modal-kegiatan-overlay'
    );

    function bukaDetailKegiatan(id) {

        const kegiatan = daftarKegiatan.find(function (item) {
            return String(item.id) === String(id);
        });

        if (!kegiatan || !modalDetail) {
            return;
        }

        const tanggalMulai = formatTanggalIndonesia(
            kegiatan.tanggal_mulai
        );

        const tanggalSelesai = formatTanggalIndonesia(
            ambilTanggalSelesai(kegiatan)
        );

        const status = tentukanStatus(kegiatan);

        document.getElementById('detailKategori').textContent =
            kegiatan.kategori || 'Belum dikategorikan';

        document.getElementById('detailStatus').textContent = status;

        document.getElementById('detailJudul').textContent =
            kegiatan.judul;

        document.getElementById('detailTanggal').textContent =
            tanggalMulai === tanggalSelesai
                ? tanggalMulai
                : `${tanggalMulai} - ${tanggalSelesai}`;

        document.getElementById('detailLokasi').textContent =
            kegiatan.lokasi || 'Belum ditentukan';

        document.getElementById('detailDeskripsi').textContent =
            kegiatan.deskripsi || 'Tidak ada deskripsi kegiatan.';

        modalDetail.hidden = false;
        document.body.style.overflow = 'hidden';
    }

    function tutupDetailKegiatan() {

        if (!modalDetail) {
            return;
        }

        modalDetail.hidden = true;
        document.body.style.overflow = '';
    }

    // Klik kartu pada Daftar
    daftarKegiatanHTML.addEventListener('click', function (event) {

        const kartu = event.target.closest('.kegiatan-card');

        if (kartu) {
            bukaDetailKegiatan(kartu.dataset.id);
        }

    });

    // Klik kartu pada Timeline
    timelineKegiatanHTML.addEventListener('click', function (event) {

        const kartu = event.target.closest('.timeline-item');

        if (kartu) {
            bukaDetailKegiatan(kartu.dataset.id);
        }

    });

    // Tombol tutup dan overlay
    tombolTutupModal?.addEventListener('click', tutupDetailKegiatan);

    overlayModal?.addEventListener('click', tutupDetailKegiatan);

    // Tutup dengan tombol Escape
    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            tutupDetailKegiatan();
        }

    });


    // =====================================
    // 11. NAVIGASI BULAN
    // =====================================

    if (tombolSebelumnya) {

        tombolSebelumnya.addEventListener('click', function () {

            bulanAktif--;

            if (bulanAktif < 0) {
                bulanAktif = 11;
                tahunAktif--;
            }

            tampilkanKalender();

        });
    }

    if (tombolBerikutnya) {

        tombolBerikutnya.addEventListener('click', function () {

            bulanAktif++;

            if (bulanAktif > 11) {
                bulanAktif = 0;
                tahunAktif++;
            }

            tampilkanKalender();

        });
    }

    if (tombolHariIni) {

        tombolHariIni.addEventListener('click', function () {

            bulanAktif = hariIni.getMonth();
            tahunAktif = hariIni.getFullYear();

            tampilkanKalender();

        });
    }


    // =====================================
    // NAVIGASI BULAN TIMELINE
    // =====================================

    const timelineSebelumnya = document.getElementById(
        'timelineBulanSebelumnya'
    );

    const timelineBerikutnya = document.getElementById(
        'timelineBulanBerikutnya'
    );

    const timelineHariIni = document.getElementById(
        'timelineBulanSekarang'
    );

    timelineSebelumnya.addEventListener('click', function () {

        bulanTimeline--;

        if (bulanTimeline < 0) {
            bulanTimeline = 11;
            tahunTimeline--;
        }

        tampilkanTimeline();

    });

    timelineBerikutnya.addEventListener('click', function () {

        bulanTimeline++;

        if (bulanTimeline > 11) {
            bulanTimeline = 0;
            tahunTimeline++;
        }

        tampilkanTimeline();

    });

    timelineHariIni.addEventListener('click', function () {

        bulanTimeline = hariIni.getMonth();
        tahunTimeline = hariIni.getFullYear();

        tampilkanTimeline();

    });


    // =====================================
    // 12. EVENT FILTER DAN PENCARIAN
    // =====================================

    filterKategori.addEventListener('change', function () {

        tampilkanDaftar();
        tampilkanTimeline();
        tampilkanKalender();

    });

    inputPencarian.addEventListener('input', function () {

        tampilkanDaftar();
        tampilkanTimeline();
        tampilkanKalender();

    });

    // =====================================
    // 13. TAMPILAN AWAL
    // =====================================

    tampilkanDaftar();
    tampilkanTimeline();
    tampilkanKalender();

    gantiTampilan('daftar');

}

// =====================================
// JALANKAN SETELAH HTML SELESAI DIBACA
// =====================================

if (document.readyState === 'loading') {

    document.addEventListener('DOMContentLoaded', initKalender);

} else {

    initKalender();

}
