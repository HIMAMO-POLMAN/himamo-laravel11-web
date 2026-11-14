
<section id="kalender-kegiatan" class="kalender-section">

    <div class="container">

        {{-- Judul Kalender --}}
        <div class="kalender-header">
            <h2>Kalender Kegiatan</h2>
            <p>
                Temukan berbagai agenda dan kegiatan HIMAMO.
            </p>
        </div>

        {{-- Navigasi Bulan --}}
        <div class="kalender-navigation">

            <div class="kalender-month">
                <h3 id="namaBulan">November 2026</h3>
            </div>

            <div class="kalender-navigation-button">
                <button type="button" id="bulanSebelumnya">
                    &lt;
                </button>

                <button type="button" id="bulanSekarang">
                    Hari Ini
                </button>

                <button type="button" id="bulanBerikutnya">
                    &gt;
                </button>
            </div>

        </div>

        {{-- Kalender --}}
        <div class="kalender-wrapper">

            {{-- Nama Hari --}}
            <div class="kalender-hari">
                <div>Senin</div>
                <div>Selasa</div>
                <div>Rabu</div>
                <div>Kamis</div>
                <div>Jumat</div>
                <div>Sabtu</div>
                <div>Minggu</div>
            </div>

            {{-- Tanggal akan dibuat oleh JavaScript --}}
            <div id="kalenderTanggal" class="kalender-tanggal">
            </div>

        </div>

    </div>
</section>

<script>
    window.kegiatanHimamo = {{ Js::from(
        $kegiatan->map(function ($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'tanggal_mulai' => $item->tanggal_mulai->format('Y-m-d'),
                'tanggal_selesai' => $item->tanggal_selesai
                    ? $item->tanggal_selesai->format('Y-m-d')
                    : null,
                'lokasi' => $item->lokasi,
            ];
        })->values()
    ) }};
</script>
