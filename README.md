# TP3DPBO2024

# Halaman Utama: #
Menampilkan daftar produk hewan peliharaan yang telah ditambahkan.
Pengguna dapat melihat, mengedit, dan menghapus produk yang ada.
Terdapat fitur pencarian untuk mencari produk berdasarkan kategori dan harga.
# Tambah Produk Baru: #
Halaman ini memungkinkan pengguna untuk menambah produk baru ke dalam sistem.
Pengguna diminta untuk mengisi formulir dengan informasi produk seperti nama, harga, deskripsi, dan kategori.
Setelah mengisi formulir, pengguna dapat menyimpan produk baru tersebut ke dalam database.
# Edit Produk: #
Halaman ini memungkinkan pengguna untuk mengedit informasi produk yang sudah ada.
Pengguna dapat mengubah nama, harga, deskripsi, dan kategori produk.
Setelah melakukan perubahan, pengguna dapat menyimpan perubahan tersebut ke dalam database.
# Hapus Produk: #
Dari halaman utama, pengguna dapat menghapus produk dengan mengklik tombol "Hapus" di sebelah produk yang ingin dihapus.
Pengguna kemudian akan diminta konfirmasi sebelum produk benar-benar dihapus dari database.
# Cari Produk : #
Halaman ini memungkinkan pengguna untuk mencari produk berdasarkan kategori dan harga.
Pengguna dapat memasukkan kata kunci pencarian dan memilih kategori serta rentang harga.
Hasil pencarian akan ditampilkan dalam daftar produk yang sesuai.

# Fitur: #

Menambah produk baru ke dalam database.
Mengedit informasi produk yang sudah ada.
Menghapus produk dari database.
Mencari produk berdasarkan kategori dan harga.
Tampilan yang responsif dan ramah pengguna.

desain database
Desain database tersebut terdiri dari dua tabel utama: `categories` dan `products`, yang bertujuan untuk menyimpan informasi terkait kategori dan produk dalam suatu sistem.

1. **Tabel `categories`:**
   - **id:** Menyimpan identifikasi unik untuk setiap kategori. Ini adalah kunci utama tabel.
   - **name:** Menyimpan nama kategori produk. Ini didefinisikan sebagai kolom `varchar(256)`, yang memungkinkan teks hingga 256 karakter.
   - **created:** Menyimpan timestamp ketika kategori dibuat. Ini membantu dalam pelacakan waktu pembuatan kategori.
   - **modified:** Menyimpan timestamp ketika kategori terakhir kali dimodifikasi. Ini membantu dalam melacak waktu terakhir perubahan kategori.

2. **Tabel `products`:**
   - **id:** Menyimpan identifikasi unik untuk setiap produk. Ini adalah kunci utama tabel.
   - **name:** Menyimpan nama produk. Didefinisikan sebagai `varchar(32)`, yang membatasi nama produk hingga 32 karakter.
   - **description:** Menyimpan deskripsi produk. Didefinisikan sebagai `text`, yang memungkinkan teks panjang untuk deskripsi.
   - **price:** Menyimpan harga produk.
   - **category_id:** Menyimpan ID kategori produk yang terkait. Ini adalah kunci asing yang merujuk ke kolom `id` di tabel `categories`.
   - **created:** Menyimpan timestamp ketika produk dibuat.
   - **modified:** Menyimpan timestamp ketika produk terakhir kali dimodifikasi.

**Keterangan Tambahan:**
- Setiap kategori produk disimpan dalam tabel `categories`, dengan setiap entri kategori memiliki ID unik dan nama kategori yang relevan.
- Setiap produk dihubungkan dengan salah satu kategori melalui kolom `category_id`, yang merupakan kunci asing yang merujuk ke ID kategori yang sesuai dalam tabel `categories`.
- Penggunaan kolom `created` dan `modified` memungkinkan pelacakan waktu pembuatan dan modifikasi produk atau kategori.
- Tabel `categories` menggunakan `InnoDB` sebagai engine penyimpanan, sedangkan tabel `products` menggunakan `MyISAM`.
- Ini adalah desain sederhana yang memungkinkan pengelolaan kategori dan produk dalam sistem yang efisien dan terstruktur.
