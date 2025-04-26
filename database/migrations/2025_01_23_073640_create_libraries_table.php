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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique()->nullable();
            $table->string('title');
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('tahun_terbit')->nullable();
            $table->text('abstrak');
            $table->text('bahasa');
            $table->integer('jumlah_halaman');
            $table->string('cover')->nullable();
            $table->string('slug')->unique();
            $table->text('url');
            $table->foreignId('collection')->nullable()->constrained('library_collections')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
