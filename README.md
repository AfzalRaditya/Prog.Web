# Pro.Web
Tugas Company Profile

 Muktijaya1: Your Packaging Solution
 Fitur Utama Website

Program ini diimplementasikan dalam 3 halaman utama dengan fitur-fitur interaktif yang lengkap:

### Halaman Beranda (`index.html`)

  * **Header & Navigasi:** Navigasi mudah ke 3 halaman utama.
  * **Hero Section Dinamis:** Judul utama ("Satu Toko, Semua Beres...") dimuat menggunakan efek *typing* (**JavaScript**) untuk kesan modern.
  * **Unique Selling Proposition (USP):** Menampilkan 3 keunggulan utama perusahaan (One-Stop Solution, Stok Melimpah, Fokus UMKM) dalam format *card*.
  * **Kategori Produk Unggulan:** Menampilkan 3 kartu produk utama yang di-*inject* menggunakan **JQuery** dan CSS Flexbox untuk tata letak 3-sejajar yang responsif.

### Halaman Tentang Kami (`about.html`)

  * **Visi & Misi:** Informasi mendalam mengenai tujuan dan langkah strategis perusahaan.
  * **Accordion Keunggulan:** Detail keunggulan dan komitmen perusahaan disajikan dalam menu *accordion* interaktif (**JQuery**), memungkinkan konten disajikan secara ringkas dan menarik.
  * **Informasi Kontak & Lokasi:** Detail kontak resmi perusahaan.

### Halaman Produk & Katalog (`product.php`)

  * **Katalog Produk:** Daftar 4 kategori produk utama yang ditampilkan secara semi-dinamis menggunakan *loop* **PHP** (simulasi pengambilan data dari *array*).
  * **Kalkulator Estimasi Kustom:** Alat interaktif yang memungkinkan pengunjung memasukkan dimensi (P, L, T) dan kuantitas kardus. Perhitungan estimasi biaya dilakukan sepenuhnya di sisi *client* menggunakan **JavaScript murni**.
  * **Formulir Konsultasi Kustom:** Formulir untuk pemesanan/konsultasi lebih lanjut.
      * **Validasi *Client-Side*:** Memastikan format Email dan Nomor Telepon/WA valid sebelum pengiriman data, diimplementasikan menggunakan **JQuery/JavaScript**.
      * **Proses Data *Server-Side*:** Data formulir diproses menggunakan **PHP** (`$_POST`) untuk mensimulasikan penerimaan dan konfirmasi pengiriman pesan.

-----

## 🛠️ Persyaratan dan Implementasi Teknologi

Program ini dibangun dengan ketentuan **tidak menggunakan *framework* CSS** (seperti Bootstrap) dan mengimplementasikan minimal satu fungsi dari setiap *client-side* dan *server-side script*.

| Teknologi | Tipe | Implementasi Fungsionalitas |
| :--- | :--- | :--- |
| **HTML5** | Struktur Dasar | Kerangka 3 halaman (Home, About, Product). |
| **CSS3** | Styling & Layout | Desain profesional dan *layout* kartu produk yang dipaksa 3-sejajar menggunakan **Pure Flexbox**. |
| **PHP** | Server-Side | Digunakan untuk **logika *looping* produk** dan **pemrosesan formulir kontak** (`product.php`). |
| **JQuery / Javascript** | Client-Side | 1. **Animasi Typing** (`index.html`). 2. **Accordion** (`about.html`). 3. **Kalkulator Estimasi** (`product.php`). 4. **Validasi Formulir** (`product.php`). |

### Cara Menjalankan Program

1.  **Instalasi Server:** Program ini memerlukan *web server* lokal (misalnya **Laragon, XAMPP, atau MAMP**) karena adanya file `.php`.
2.  **Penempatan File:** Pindahkan seluruh folder proyek (`muktijaya1`) ke dalam direktori publik *server* Anda (misalnya `C:\laragon\www/muktijaya1/`).
3.  **Akses:** Pastikan *Apache* (atau *Nginx*) sudah berjalan, lalu akses di *browser* Anda:
    ```
    http://localhost/muktijaya1/
    ```

-----

## 👨‍💻 Kontributor

Proyek ini dikembangkan oleh [Nama/NIM Anda] sebagai tugas pemrograman web.
