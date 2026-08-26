# 🚀 Nusa Garuda Studio - Backend API & Admin Dashboard (`be-ngs`)

Backend API & Dashboard Admin berbasis **Laravel 11+ / 13** dan **Filament Admin Panel** untuk Nusa Garuda Studio.

---

## 📌 Prasyarat System (Prerequisites)

Sebelum memulai instalasi, pastikan sistem Anda telah ter-install:

- **PHP** `>= 8.3` (dengan ekstensi `pdo`, `mbstring`, `openssl`, `curl`, `sqlite3` atau `mysqli`)
- **Composer** `>= 2.x`
- **Node.js** `>= 18.x` & **NPM**
- **SQLite** (default) atau **MySQL / MariaDB**

---

## 🛠️ Langkah Instalasi & Setup (Installation Steps)

Ikuti langkah-langkah di bawah ini untuk menginstall dan menjalankan backend di lingkungan lokal:

### 1. Masuk ke Direktori Backend
```bash
cd be-ngs
```

### 2. Install Dependency Composer
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:

* **Windows (PowerShell / CMD):**
  ```powershell
  copy .env.example .env
  ```
* **Linux / macOS / Git Bash:**
  ```bash
  cp .env.example .env
  ```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Setup Database

#### 🔹 Opsi A: Menggunakan SQLite (Default)
Secara bawaan, aplikasi dikonfigurasi menggunakan **SQLite**. Jika file database belum ada, buat file `database.sqlite` di folder `database/`:

* **Windows (PowerShell):**
  ```powershell
  New-Item -ItemType File -Path database\database.sqlite -Force
  ```
* **Linux / macOS / Bash:**
  ```bash
  touch database/database.sqlite
  ```

#### 🔹 Opsi B: Menggunakan MySQL / MariaDB
Sesuaikan baris konfigurasi database pada file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migrasi & Data Seeder
Jalankan migrasi tabel beserta seeder data awal (termasuk akun admin default):
```bash
php artisan migrate:fresh --seed
```

---

> [!IMPORTANT]
> ### 🚨 Langkah Wajib: Symlink Storage (PENTING!)
> Anda **WAJIB** menjalankan perintah berikut agar file upload (seperti gambar project, testimonial, tim, dan galeri) dapat diakses secara publik di browser:
> ```bash
> php artisan storage:link
> ```

---

### 7. Install & Build Frontend Assets (Jika Dibutuhkan)
```bash
npm install
npm run build
```

### 8. Jalankan Local Development Server
```bash
php artisan serve
```
Aplikasi backend akan berjalan di **`http://127.0.0.1:8000`**.

---

## 🔐 Kredensial Dashboard Admin (Filament)

Dashboard Admin Filament dapat diakses melalui URL:

- **URL Admin Panel**: [http://localhost:8000/admin](http://localhost:8000/admin)
- **Email**: `admin@nusagaruda.com`
- **Password**: `password`

---

## ⚡ Perintah Berguna (Common Commands Cheat Sheet)

```bash
# Jalankan ulang server lokal
php artisan serve

# Reset & isi ulang database dari awal
php artisan migrate:fresh --seed

# Clear cache aplikasi & konfigurasi
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Membuat symlink storage (jika gambar 404)
php artisan storage:link
```

