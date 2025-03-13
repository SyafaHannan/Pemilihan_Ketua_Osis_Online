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
        Schema::create('forum',function(Blueprint $table){
            $table->integer('id_forum',true,false);
            $table->string('judul',100)->nullable(false);
            $table->string('akses')->nullable(false);
            $table->date('tanggal_mulai')->nullable(false);
            $table->date('tanggal_akhir')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
