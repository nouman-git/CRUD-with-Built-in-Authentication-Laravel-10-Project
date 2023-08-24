<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('owner');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('type_id');
            $table->integer('price');
            // $table->timestamps();

            // Define foreign key constraints
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
