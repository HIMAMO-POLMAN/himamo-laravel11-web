<p align="center">
  <img src="https://github.com/user-attachments/assets/1f414f61-39f0-48af-b59c-e0d3137db76d" alt="himamobanner" width="600">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/status-in%20development-yellow"> <a href="./LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue"></a>
</p>

# Website HIMAMO

**HIMAMO\_Web** adalah platform web resmi Himpunan Mahasiswa Teknik Manufaktur Otomasi dan Mekatronika (HIMAMO) Politeknik Manufaktur Negeri Bandung. Platform ini dirancang untuk menyajikan informasi organisasi, sumber daya akademik, serta pembaruan yang relevan bagi mahasiswa dan masyarakat umum.

**Development Branch by Rendi** Ini merupakan branch development yang di bangun oleh Rendi sebagai anggota dari subdivisi website HIMAMO 


## Teknologi yang Digunakan

* **Laravel 11**: Framework PHP untuk sisi backend.

  * Menggunakan **Laravel Fortify** untuk otentikasi dan keamanan.
* **Vite**: Bundler frontend untuk pengembangan cepat.
* **SCSS & Bootstrap**: Styling antarmuka dan layout responsif.
* **MySQL & phpMyAdmin**: Sistem basis data relasional.
* **PHP 8.3**: Bahasa pemrograman server-side.

## Fitur

* **AE Informasi**
  Portal informasi terpusat untuk kegiatan HIMAMO, pengumuman, dan pembaruan organisasi.

* **AE Pustaka**
  Perpustakaan digital (dalam pengembangan) yang ditujukan untuk menyimpan dokumen akademik, materi pembelajaran, dan referensi mahasiswa.

* **Manajemen RBAC (Role-Based Access Control)**
  Sistem manajemen hak akses berbasis peran, memungkinkan kontrol akses pengguna berdasarkan role (mis. admin, pengurus, anggota). Menggunakan package Spatie Laravel Permission.

## Instalasi & Setup

1. **Clone repositori**

   ```bash
   git clone https://github.com/HIMAMO-POLMAN/himamo-laravel11-web/
   cd himamo-web
   ```

2. **Instalasi dependensi**

   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi environment**

   * Salin `.env.example` menjadi `.env`
   * Sesuaikan konfigurasi database dan variabel lainnya. Untuk detail lengkap, hubungi tim pengembang.

4. **Generate application key**

   ```bash
   php artisan key:generate
   ```

5. **Migrasi dan seeding database**

   ```bash
   php artisan migrate --seed
   # Atau jika ingin refresh database:
   php artisan migrate:fresh --seed
   ```

6. **Menjalankan server pengembangan**

   ```bash
   php artisan serve
   npm run dev
   ```

## Penggunaan

* Buka `http://localhost:8000` atau `http://127.0.0.1:8000` di browser.
* Login dengan akun yang memiliki izin akses untuk melihat konten tertentu.

## Standar Branching Git/GitHub

* `main`: Kode siap produksi
* `develop`: Branch pengembangan aktif
* `feature/<nama>`: Pengembangan fitur tertentu
* `bugfix/<nama>`: Perbaikan bug
* `release/<versi>`: Tahapan sebelum rilis

## Status Proyek

Proyek ini sedang **dalam tahap pengembangan** dan akan terus diperbarui secara berkala.

## Kontribusi

Kontribusi sangat terbuka. Silakan fork repositori ini, buat issue, atau ajukan pull request untuk perbaikan dan pengembangan fitur.

## Tim Pengembang

* **Kominfo 2020**: Setup awal dan pengembangan dasar.
* **Divisi Informasi 2023**: Pengembangan berkelanjutan.
* **MEDINFO 2024**: Pengembangan lanjutan dan penambahan fitur.

## Kontak

* **Email**: [informasihimamo@gmail.com](mailto:informasihimamo@gmail.com)

## Lisensi

Proyek ini dilisensikan di bawah MIT License. Lihat file [LICENSE](LICENSE) untuk informasi lengkap.



## Panduan Standar Branch `develop` HIMAMO_Web

Branch `develop` adalah cabang utama untuk pengembangan aktif pada proyek **HIMAMO_Web**. Semua fitur baru, perbaikan bug, dan perubahan signifikan lainnya harus dibuat melalui branch turunan dari `develop`, dan tidak langsung pada `main`.

> 📚 kita mengikuti standarisasi Git berdasarkan [Git Feature Branch Workflow by DigitalJhelms](https://gist.github.com/digitaljhelms/4287848).

---

### 1. **Alur Git yang Direkomendasikan**

#### A. Membuat Branch Baru dari `develop`
Gunakan penamaan branch yang sesuai dengan jenis pekerjaan:

- `feature/<nama-fitur>` untuk fitur baru
- `bugfix/<nama-bug>` untuk perbaikan bug
- `hotfix/<nama-hotfix>` untuk perbaikan kritikal

```bash
git checkout develop
git pull origin develop
git checkout -b feature/nama-fitur
```

#### B. Commit Standar
Gunakan pesan commit yang deskriptif dan konsisten:

```bash
git add .
git commit -m "[fitur] Menambahkan halaman pustaka"
```

Prefix commit yang digunakan:
- `[fitur]` untuk penambahan
- `[perbaikan]` untuk bug fix
- `[refactor]` untuk refactor kode
- `[hapus]` untuk penghapusan fitur/kode

#### C. Push ke Remote
```bash
git push origin feature/nama-fitur
```

---

### 2. **Pull Request ke `develop`**

Setelah pekerjaan pada branch selesai:

1. Pastikan branch `develop` terbaru sudah digabung:
   ```bash
   git checkout develop
   git pull origin develop
   git checkout feature/nama-fitur
   git merge develop
   ```

2. Resolusi konflik jika ada, lalu push kembali:
   ```bash
   git push origin feature/nama-fitur
   ```

3. Buka Pull Request (PR) dari branch ke `develop` via GitHub.

4. Reviewer akan mengevaluasi dan menyetujui PR sebelum merge.

---

### 3. **Migrasi Database di Branch `develop`**

Untuk perubahan struktur database:

1. Tambahkan file migration via artisan:
   ```bash
   php artisan make:migration nama_migration
   ```

2. Jalankan migrasi lokal terlebih dahulu:
   ```bash
   php artisan migrate
   ```

3. Sertakan info pada PR tentang file migrasi dan instruksi migrasi.

---

### 4. **Standar Sync `develop` Lokal dengan Remote**

Untuk menghindari konflik saat update:

```bash
git checkout develop
git pull origin develop
```

Jika kamu sudah berada di branch kerja dan ingin update develop:

```bash
git checkout develop
git pull origin develop
git checkout feature/nama-fitur
git merge develop
```

---

### 5. **Konvensi Umum**
- Jangan langsung push ke `develop` atau `main`.
- Gunakan Pull Request untuk semua perubahan.
- Sertakan deskripsi PR dengan jelas dan ringkas.
- Setiap perubahan signifikan pada database harus dilengkapi dengan migrasi dan dokumentasi.

---

> 📩 Jika bingung atau terjadi konflik besar, diskusikan saja sebelum lanjut merge atau migrasi besar.
