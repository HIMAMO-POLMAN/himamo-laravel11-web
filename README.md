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
