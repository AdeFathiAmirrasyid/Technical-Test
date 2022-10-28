<?php

use App\Enums\Satuan;
use App\Enums\Status;
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
        Schema::create('daftar_products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('lokasi');
            $table->integer('tersedia');
            $table->enum('satuan', [
                Satuan::Pak->value,
                Satuan::Bal->value,
                Satuan::Dus->value,
                Satuan::Pcs->value,
            ]);
            $table->enum('status', [
                Status::Terpenuhi->value,
                Status::Tidak_Terpenuhi->value,
            ]);
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
        Schema::dropIfExists('daftar_products');
    }
};
