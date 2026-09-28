# panduan #
Autentikasi (POST /api/login)

Header: Content-Type: application/json

Body: {"email": "adminmerchH2H@gmail.com", "password": "password123"}

Respons: Mengembalikan access_token untuk mengakses rute yang terkunci.

Lihat Produk (GET /api/products)

Filter Pencarian: Tambahkan parameter di akhir URL, contoh: /api/products?idol_id=1&search=T-Shirt.

Respons: Menampilkan daftar produk dengan struktur paginasi (maksimal 5 data per halaman).

Tambah Produk (POST /api/products)

Header: Authorization: Bearer <token_dari_login>

Format: Wajib menggunakan Multipart/Form-Data karena mengirimkan file fisik.

Validasi Gambar: Maksimal 2MB, format .jpg, .jpeg, atau .png.