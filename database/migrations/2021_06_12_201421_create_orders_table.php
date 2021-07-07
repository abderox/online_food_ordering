<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_ord');
            $table->timestamps();
            $table->bigInteger('id_client')->unsigned();
            $table->tinyInteger('status_order');
            $table->bigInteger('id_plat')->unsigned();
            $table->Integer('id_liv')->unsigned();
            $table->foreign('id_plat')->references('id')->on('plats')->onDelete('cascade'); 
            $table->string('lng');
            $table->string('lat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
