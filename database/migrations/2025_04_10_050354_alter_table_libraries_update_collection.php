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
        Schema::table("libraries", function (Blueprint $table){
            $table->dropColumn('collection');
            $table->foreignId('collection')->nullable()->constrained('library_collections')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("libraries", function (Blueprint $table){
            $table->dropColumn('collection');
            $table->enum('collection', ['TRO', 'TRMO','TRIN','Teori']);
        });
    }
};
