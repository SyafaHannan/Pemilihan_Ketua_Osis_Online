<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\FuncCall;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('admin',function(Blueprint $table){
            $table->integer('id_admin',true,false);
            $table->string('email',100)->unique()->nullable(false);
            $table->enum('role',['Super Admin','Admin'])->default('Admin');
            $table->string('password')->nullable(false);
            $table->string('username',100)->nullable(false);
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
