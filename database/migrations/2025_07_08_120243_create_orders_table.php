<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('telepon');
        $table->text('alamat');
        $table->string('metode_pembayaran'); // tambahkan ini
        $table->json('items');
        $table->integer('total');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
