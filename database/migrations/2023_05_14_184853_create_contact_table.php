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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('message');

            $table->unsignedBigInteger('reparateur_id');

            $table->unsignedBigInteger('demandeur_id');
            $table->foreign('demandeur_id')->references('id')->on('demandeur');


            $table->foreign('reparateur_id')->references('id')->on('reparateur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
