<section id="kalender-kegiatan" class="kalender-section">

    <div class="container">

        {{-- Judul --}}
        <div class="kalender-header">
            <h2>Kalender Kegiatan</h2>
            <p>Temukan berbagai agenda dan kegiatan HIMAMO.</p>
        </div>

        {{-- Navigasi Tampilan --}}
        <div class="tampilan-navigation">
            <button type="button" class="tampilan-button aktif"
                data-tampilan="daftar">
                Daftar
            </button>

            <button type="button" class="tampilan-button"
                data-tampilan="timeline">
                Timeline
            </button>

            <button type="button" class="tampilan-button"
                data-tampilan="kalender">
                Kalender
            </button>
        </div>

        {{-- Filter Kategori --}}
        <div class="kegiatan-filter">

            <div class="filter-kategori">
                <label for="filterKategori">Kategori</label>

                <select id="filterKategori">
                    <option value="semua">Semua</option>
                    <option value="MTH">MTH</option>
                    <option value="Kaderisasi">Kaderisasi</option>
                    <option value="PSDM">PSDM</option>
                    <option value="SARPRAS">SARPRAS</option>
                    <option value="HUBDAL">HUBDAL</option>
                    <option value="PENGMAS">PENGMAS</option>
                    <option value="RELOG">RELOG</option>
                    <option value="MEDINFO">MEDINFO</option>
                    <option value="EKRAF">EKRAF</option>
                </select>
            </div>

            <div class="filter-pencarian">
                <label for="cariKegiatan">Cari kegiatan</label>
                <input type="text" id="cariKegiatan"
                    placeholder="Cari nama kegiatan...">
            </div>

        </div>

        {{-- Tampilan Daftar --}}
        <div id="tampilanDaftar" class="tampilan-content">

            <div id="daftarKegiatan" class="daftar-kegiatan">
                {{-- Diisi JavaScript --}}
            </div>

        </div>

        
        <div id="tampilanTimeline"
            class="tampilan-content"
            hidden>

            {{-- Navigasi Bulan Timeline --}}
            <div class="timeline-navigation">

                <h3 id="namaBulanTimeline">November 2026</h3>

                <div class="timeline-navigation-button">
                    <button type="button" id="timelineBulanSebelumnya">
                        &lt;
                    </button>

                    <button type="button" id="timelineBulanSekarang">
                        Hari Ini
                    </button>

                    <button type="button" id="timelineBulanBerikutnya">
                        &gt;
                    </button>
                </div>

            </div>

            <div id="timelineKegiatan" class="timeline-kegiatan">
                {{-- Diisi JavaScript --}}
            </div>

        </div>


        {{-- Tampilan Kalender --}}
        <div id="tampilanKalender"
            class="tampilan-content"
            hidden>

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

                <div class="kalender-hari">
                    <div>Senin</div>
                    <div>Selasa</div>
                    <div>Rabu</div>
                    <div>Kamis</div>
                    <div>Jumat</div>
                    <div>Sabtu</div>
                    <div>Minggu</div>
                </div>

                <div id="kalenderTanggal"
                    class="kalender-tanggal">
                </div>

            </div>

        </div>

    </div>

    {{-- Modal Detail Kegiatan --}}
    <div id="modalDetailKegiatan" class="modal-kegiatan" hidden>

        <div class="modal-kegiatan-overlay"></div>

        <div class="modal-kegiatan-content">

            <div class="modal-kegiatan-header">
                <h3>Detail Kegiatan</h3>

                <button type="button" id="tutupModalKegiatan"
                    aria-label="Tutup">
                    &times;
                </button>
            </div>

            <div class="modal-kegiatan-body">

                <div class="modal-kegiatan-label">
                    <span id="detailKategori"></span>
                    <span id="detailStatus"></span>
                </div>

                <h2 id="detailJudul"></h2>

                <div class="modal-detail-item">
                    <strong>Tanggal Kegiatan</strong>
                    <p id="detailTanggal"></p>
                </div>

                <div class="modal-detail-item">
                    <strong>Lokasi</strong>
                    <p id="detailLokasi"></p>
                </div>

                <div class="modal-detail-item">
                    <strong>Deskripsi</strong>
                    <p id="detailDeskripsi"></p>
                </div>

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
                'kategori' => $item->kategori,
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
