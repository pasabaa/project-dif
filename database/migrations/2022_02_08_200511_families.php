<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Families extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->text('target');
            $table->text('addressed');
            $table->text('requirements');
            $table->string('phone_number')->nullable();
            $table->bigInteger('id_responsable')->unsigned();
            $table->foreign('id_responsable')->references('id')->on('responsable_families')->onDelete('cascade');
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
        Schema::dropIfExists('families');
    }
}
