# Nufaza Backend

Nufaza frontend adalah website yang digunakan untuk salah satu test skill backend.

# Cara Menjalankan Aplikasi

Jika memakai Docker, silahkan ketikan perintah :

`docker-compose up`

Jika tidak memakai Docker, langkah diatas bisa dilewat. Langsung ikuti perintah dibawah yaitu :

`cp .env.example .env` kemudian sesuaikan dengan konfigurasi yang ada pada lokal masing-masing.

Migrasikan tabel dengan perintah `php artisan migrate` kemudian jalankan aplikasi menggunakan perintahn `php artisan serve`.

Akses aplikasi melalui browser dengan alamat `localhost:8080` atau sesuai dengan port yang berjalan.

# Memakai Aplikasi

Aplikasi ini berfungsi untuk membaca file yang ada pada file `data_soal.txt` dan aplikasi akan membaca isi dari file tersebut dan diproses masuk ke dalam database.
