# evolusi-pl-24-535633-SV-24276

Repository untuk tugas **Konstruksi & Evolusi Perangkat Lunak** (2026) —
Pertemuan 2 (*Manajemen GitHub & Prinsip CI*) dan Pertemuan 3
(*Continuous Deployment*).

## Aplikasi

Aplikasi pencatat tugas kuliah berbasis **Laravel**. Fitur: tambah tugas
(judul, deskripsi, deadline, prioritas), tandai selesai, hapus.

| Berkas | Isi |
|---|---|
| `database/migrations/..._create_tugas_table.php` | Skema tabel `tugas` |
| `app/Models/Tugas.php` | Model Eloquent, casting tipe data |
| `app/Http/Requests/StoreTugasRequest.php` | Validasi input |
| `app/Http/Controllers/TugasController.php` | Logika CRUD |
| `routes/web.php` | Pendaftaran route resource `tugas` |
| `resources/views/tugas/index.blade.php` | Tampilan form dan daftar tugas |
| `tests/Feature/TugasTest.php` | Pengujian fitur CRUD |
| `database/factories/TugasFactory.php` | Factory data uji |

## Menjalankan aplikasi

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Menjalankan pengujian

```bash
php artisan test
```

## Alur branch

Kode **tidak pernah** mendarat langsung di `main`. `main` adalah yang terakhir.