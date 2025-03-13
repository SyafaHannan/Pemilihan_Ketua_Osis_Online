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
        //
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id_user', true, false);
            $table->string('username', 60)->nullable(false);
            $table->string('no_induk',60)->unique()->nullable(false);
            $table->string('kelas', 60);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('status')->default('Belum Memilih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('akun');
    }
};
