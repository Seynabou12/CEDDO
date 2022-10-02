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
        Schema::create('livre_acteurs', function (Blueprint $table) {
         
            $table->foreignId("livre_id")->constrained("livres");
            $table->foreignId("acteur_id")->constrained("acteurs");
            $table->primary(["acteur_id", "livre_id"]);
            
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
        Schema::dropIfExists('livre_acteurs');
    }
};
