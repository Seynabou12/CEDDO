<?php

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
        Schema::create('nouveautes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("uuid")->nullable();
            $table->string('titre')->nullable();
            $table->string('contexte')->nullable();
            $table->string('nombrePage')->nullable();
            $table->string('imageCouverture', 300)->nullable();
            $table->string('nomAuteur')->nullable();
            $table->string('biographie')->nullable();
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
        Schema::dropIfExists('nouveautes');
    }
};
