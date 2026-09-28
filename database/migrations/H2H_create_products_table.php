<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');        // Nama merchandise
    $table->decimal('price', 10, 2); // Harga
    $table->integer('stock');      // Jumlah stok
    $table->string('category');    // official / fanmade
    $table->string('idol_group');  // Nama grup idol
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
