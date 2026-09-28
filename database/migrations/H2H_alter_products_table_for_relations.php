<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan ID relasi
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('idol_id')->nullable()->constrained('idols')->nullOnDelete();

            // Menghapus kolom teks lama yang sudah tidak terpakai
            $table->dropColumn(['category', 'idol_group']);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category')->nullable();
            $table->string('idol_group')->nullable();
            $table->dropForeign(['category_id']);
            $table->dropForeign(['idol_id']);
            $table->dropColumn(['category_id', 'idol_id']);
        });
    }
};
