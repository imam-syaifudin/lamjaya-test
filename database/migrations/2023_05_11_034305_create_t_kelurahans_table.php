<?php

use App\Models\TKecamatan;
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
        Schema::create('t_kelurahans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama_kelurahan');
            $table->foreignIdFor(TKecamatan::class);
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kelurahans');
    }
};
