<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demandeservice', function (Blueprint $table) {
            $table->id();
            $table->string('etat');
            $table->string('date');
            $table->unsignedBigInteger('demandeur_id');
            $table->foreign('demandeur_id')->references('id')->on('demandeur');

            $table->unsignedBigInteger('reparateur_id');
            $table->foreign('reparateur_id')->references('id')->on('reparateur');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandeservice');
    }
};
