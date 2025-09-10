# 📅 Sistem Informasi Jadwal Kuliah


Sistem informasi berbasis web untuk mengelola jadwal kuliah dengan fitur CRUD (Create, Read, Update, Delete). Dibangun menggunakan **PHP + MySQL**.


## ✨ Fitur
- Tambah, lihat, edit, dan hapus jadwal kuliah.
- Data terhubung dengan tabel mata kuliah, dosen, kelas, dan ruangan.
- Tampilan tabel jadwal yang rapi dan mudah dipahami.
- Output jadwal otomatis diurutkan berdasarkan hari dan jam.


## 🛠️ Teknologi yang Digunakan
- **Frontend**: HTML, CSS (Bootstrap)
- **Backend**: PHP (Native)
- **Database**: MySQL


## 📂 Struktur Database
```sql
courses(id, name)
lecturers(id, name)
rooms(id, name)
classes(id, name)
schedules(id, course_id, lecturer_id, room_id, class_id, day, start_time, end_time)
```


## 🚀 Cara Instalasi
1. Clone repository ini:
```bash
git clone https://github.com/syfaarizal/sijadwal.git
```
2. Import database `sijadwal.sql` ke MySQL.
3. Konfigurasi koneksi database di file `db.php`.
4. Jalankan aplikasi di localhost (XAMPP/Laragon).


## 📸 Preview Tampilan
![Preview](./assets/img/preview-jadwal.png)


## 🔗 Link Demo
👉 [GitHub Repository](https://github.com/syfaarizal/sijadwal)


## 📜 Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).