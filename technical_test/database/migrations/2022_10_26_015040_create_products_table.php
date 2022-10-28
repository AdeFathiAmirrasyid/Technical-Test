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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('departemen');
            $table->string('tgl_permintaan');
            $table->unsignedBigInteger('nama_barang_id')->constrained('daftar_products')->onDelete('cascade');
            $table->string('lokasi');
            $table->integer('tersedia');
            $table->integer('qty');
            $table->text('decs');
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
        Schema::dropIfExists('products');
    }
};
