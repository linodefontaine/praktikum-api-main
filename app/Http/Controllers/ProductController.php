<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
{
    $query = Product::query();

    // Menggunakan helper request() langsung agar terhindar dari error null
    if (request()->has('search') && request('search') != '') {
        $query->where('name', 'like', '%' . request('search') . '%');
    }

    $products = $query->paginate(10);
    return response()->json($products);
}
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id', // Harus ada di tabel categories
            'idol_id' => 'required|exists:idols,id', // Harus ada di tabel idols
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('merch', 'public');
            $validatedData['image'] = $imagePath;
        }

        $product = Product::create($validatedData);
        return response()->json(['message' => 'Merchandise berhasil ditambahkan', 'data' => $product], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Merchandise tidak ditemukan'], 404);
        }
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Merchandise tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|integer',
            'stock' => 'sometimes|required|integer',
            'category_id' => 'sometimes|required|exists:categories,id',
            'idol_id' => 'sometimes|required|exists:idols,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('merch', 'public');
            $validatedData['image'] = $imagePath;
        }

        $product->update($validatedData);
        return response()->json(['message' => 'Merchandise berhasil diperbarui', 'data' => $product]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Merchandise tidak ditemukan'], 404);
        }

        // Hapus gambar jika ada
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return response()->json(['message' => 'Merchandise berhasil dihapus']);
    }
}