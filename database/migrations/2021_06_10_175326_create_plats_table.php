<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->string('nom_plat');
            $table->boolean('status_meal');
            $table->boolean('status_vegan');
            $table->boolean('status_drink');
            $table->boolean('status_islamic');
            $table->boolean('status_dessert');
            $table->bigInteger('id_restaurant')->unsigned();
            $table->string('file_path');
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
        Schema::dropIfExists('plats');
    }
}
