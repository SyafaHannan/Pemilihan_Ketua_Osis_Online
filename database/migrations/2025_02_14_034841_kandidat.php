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
        Schema::create('kandidat',function(Blueprint $table){
            $table->integer('id_kandidat',true,false);
            $table->string('calon_ketua',200)->nullable(false);
            $table->string('calon_wakil_ketua',200)->nullable(false);
            $table->text('visi')->nullable(false);
            $table->text('misi')->nullable(false);
            $table->text('foto')->nullable(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('kandidat');
    }
};
