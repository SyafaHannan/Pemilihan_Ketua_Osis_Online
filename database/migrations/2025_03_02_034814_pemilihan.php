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
        Schema::create('pemilihan',function(Blueprint $table){
            $table->integer('id_pemilihan',true,false);
            $table->integer('id_user',false,false)->unique();
            $table->integer('id_kandidat',false,false);
            $table->datetime('tanggal');
            //$table->datetime('tanggal');
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
