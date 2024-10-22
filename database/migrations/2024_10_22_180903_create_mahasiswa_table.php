<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('email');
            $table->bigInteger('nomor_hp');
            $table->integer('semester');
            $table->decimal('ipk', 3, 2);
            $table->string('berkas_syarat')->nullable();
            $table->string('original_berkas')->nullable();
            $table->string('status_ajuan')->nullable();
            $table->foreignId('beasiswa')->nullable()->constrained('beasiswa');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
};