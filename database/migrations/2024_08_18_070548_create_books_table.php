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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->string('nama_buku');
            $table->foreignId('author_id')->constrained();
            $table->foreignId('genre_id')->constrained();
            $table->date('tahun_terbit');
            $table->integer('isbn')->unique();
            $table->enum('status',['Tersedia','Dipinjam'])->default('Tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
