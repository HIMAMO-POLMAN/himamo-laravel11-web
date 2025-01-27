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
        Schema::table('pustakas', function(Blueprint $table){
            $table->string('isbn')->unique()->after('id')->nullable();
            $table->string('penulis')->after('title')->nullable();
            $table->string('penerbit')->after('penulis')->nullable();
            $table->string('tahun_terbit')->after('penerbit')->nullable();
            $table->text('abstrak')->after('tahun_terbit');
            $table->text('bahasa')->after('abstrak');
            $table->integer('jumlah_halaman')->after('bahasa');
            $table->string('cover')->after('jumlah_halaman')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pustakas', function(Blueprint $table){
            $table->dropColumn('isbn');
            $table->dropColumn('penulis');
            $table->dropColumn('penerbit');
            $table->dropColumn('tahun_terbit');
            $table->dropColumn('jumlah_halaman');
            $table->dropColumn('abstrak');
            $table->dropColumn('bahasa');
            $table->dropColumn('cover');
        });
    }
};
