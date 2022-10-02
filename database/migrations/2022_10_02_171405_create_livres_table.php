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
        Schema::create('livres', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("datePublication")->nullable();
            $table->string("publication")->nullable();
            $table->string("imageCouverture")->nullable();
            $table->string("description")->nullable();
            $table->string("nombrePage")->nullable();
            $table->string("langue")->nullable();
            $table->string("pdf")->nullable();
            $table->string("isbn")->nullable();
            $table->date("date")->nullable();
            $table->foreignId("categorie_id")->nullable()->constrained("categories");
            $table->foreignId("user_id")->nullable()->constrained("users");
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
        Schema::dropIfExists('livres');
    }
};
