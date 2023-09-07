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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nama');
            $table->string('tempatlahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('email')->unique();
            $table->string('kode');
            $table->string('telp')->nullable();
            $table->integer('status');
            $table->string('image');
            $table->string('sekolahasal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
