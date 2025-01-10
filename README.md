# Dokumentasi API - Sistem Pembelajaran

## Gambaran Umum
Dokumentasi ini menyediakan informasi tentang endpoint yang tersedia dan cara mengakses layanan sistem pembelajaran. Sistem ini menyediakan fitur otentikasi dan akses ke topik-topik pembelajaran.

## URL Dasar
```
http://ec2-18-205-163-69.compute-1.amazonaws.com:8081
```

## Autentikasi

### Registrasi
Membuat akun pengguna baru.

- **URL:** `/auth/register`
- **Metode:** `POST`
- **Tipe Konten:** `application/json`

#### Format Body Request
```json
{
  "username": "john_doe",
  "email": "john@example.com",
  "password": "password123",
  "role": "student"
}
```

### Login
Melakukan otentikasi pengguna.

- **URL:** `/auth/login`
- **Metode:** `POST`
- **Tipe Konten:** `application/json`

#### Format Body Request
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```


## Topik

### Mendapatkan Semua Topik
Mengambil daftar semua topik yang tersedia.

- **URL:** `/topik`
- **Metode:** `GET`


### Mendapatkan Topik Tertentu
Mengambil detail topik tertentu berdasarkan ID.

- **URL:** `/topik/{id}`
- **Metode:** `GET`


## Cara Penggunaan dengan Postman

1. Pertama, kirim request POST ke `/auth/register` dengan data registrasi Anda
2. Kemudian, kirim request POST ke `/auth/login` dengan kredensial Anda
3. Setelah berhasil login, Anda dapat mengakses endpoint `/topik` untuk melihat daftar topik
4. Untuk melihat detail topik tertentu, gunakan endpoint `/topik/{id}`


