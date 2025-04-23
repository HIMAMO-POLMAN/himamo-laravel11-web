<p align="center">
  <img src="https://github.com/user-attachments/assets/1f414f61-39f0-48af-b59c-e0d3137db76d" alt="himamobanner" width="600">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/status-in%20development-yellow"> <a href="./LICENSE"><img src="https://img.shields.io/badge/license-MIT-blue"></a>
</p>

# HIMAMO Website

**HIMAMO_Web** is the official web platform for the Student Association of Manufacturing Automation and Mechatronics Engineering (HIMAMO) at Politeknik Manufaktur Negeri Bandung. The platform is designed to provide organizational information, academic resources, and updates relevant to students and the public.

## Technologies Used

- **Laravel 11**: Backend PHP framework.
  - Uses **Laravel Fortify** for authentication and security.
- **Vite**: Frontend asset bundler for fast development.
- **SCSS & Bootstrap**: UI styling and responsive layout.
- **MySQL & phpMyAdmin**: Relational database system.
- **PHP 8.3**: Server-side scripting language.

## Features

- **AE Informasi**  
  Centralized information portal for HIMAMO activities, announcements, and organizational updates.

- **AE Pustaka**  
  A digital library (in development) intended to host academic documents, learning materials, and student references.

## Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/HIMAMO-POLMAN/himamo-laravel11-web/
   cd himamo-web
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   - Copy `.env.example` to `.env`
   - Configure your database and other environment variables. For full configuration details, please contact the development team.

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Run database migration and seeders**
   ```bash
   php artisan migrate --seed
   # Or if the database already exists:
   php artisan migrate:fresh --seed
   ```

6. **Run development server**
   ```bash
   php artisan serve
   npm run dev
   ```

## Usage

- Visit `http://localhost:8000` or `http://127.0.0.1:8000` in your web browser.
- Log in with an authorized account to access protected content.

## Git/GitHub Branching Standards

- `main`: Production-ready code
- `develop`: Active development branch
- `feature/<name>`: Feature-specific development
- `bugfix/<name>`: Bug fixes
- `release/<version>`: Pre-release version staging

## Project Status

This project is currently **in development** and subject to continuous updates and improvements.

## Contributions

Contributions are welcome. Feel free to fork the repository, create issues, or submit pull requests for enhancements and fixes.

## Development Team

- **Kominfo 2020**: Initial project setup and development.
- **Divisi Informasi 2023**: Ongoing development and feature implementation.

## Contact

- **Email**: [informasihimamo@gmail.com](mailto:informasihimamo@gmail.com)

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.




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
