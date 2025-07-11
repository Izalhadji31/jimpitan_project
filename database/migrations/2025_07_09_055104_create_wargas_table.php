<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('wargas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('id_warga')->unique();
        $table->string('no_hp');
        $table->string('username')->unique();
        $table->string('password');
        $table->string('rt');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
