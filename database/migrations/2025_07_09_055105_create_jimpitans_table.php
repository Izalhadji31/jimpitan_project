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
    Schema::create('jimpitans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
        $table->string('nama_warga');
        $table->date('tanggal');
        $table->string('status');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jimpitans');
    }
};
