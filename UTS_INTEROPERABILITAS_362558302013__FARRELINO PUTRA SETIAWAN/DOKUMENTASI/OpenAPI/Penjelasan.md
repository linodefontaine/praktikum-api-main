DOKUMENTASI REST API - TOKO MERCHANDISE (OPENAPI STANDARD)
Mata Kuliah: Praktikum Interoperabilitas
Nama: Farrelino Putra Setiawan (362558302013)

1. GET /api/products
   - Deskripsi: Menampilkan seluruh daftar produk
   - Status Code: 200 OK

2. GET /api/products/{id}
   - Deskripsi: Menampilkan detail produk berdasarkan ID
   - Status Code: 200 OK, 404 Not Found

3. POST /api/products
   - Deskripsi: Menambahkan data produk baru
   - Request Body: name, price, stock, category_id, idol_id
   - Status Code: 201 Created, 400 Bad Request

4. PUT /api/products/{id}
   - Deskripsi: Memperbarui data produk berdasarkan ID
   - Request Body: name, price, stock
   - Status Code: 200 OK, 404 Not Found

5. DELETE /api/products/{id}
   - Deskripsi: Menghapus data produk berdasarkan ID
   - Status Code: 200 OK, 404 Not Found