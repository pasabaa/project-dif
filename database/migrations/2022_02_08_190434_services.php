<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Services extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->bigInteger('id_type')->unsigned();
            $table->foreign('id_type')->references('id')->on('types')->onDelete('cascade');
            $table->string('area');
            $table->bigInteger('id_modality')->unsigned();
            $table->foreign('id_modality')->references('id')->on('modalities')->onDelete('cascade');
            $table->text('description');
            $table->string('url')->nullable();
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
        //
    }
}
