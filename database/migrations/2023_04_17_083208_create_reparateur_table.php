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
        Schema::create('reparateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('prenom');
            $table->string('adresse');
            $table->string('email');
            $table->string('telephone');
            $table->string('ville');
            $table->string('evaluation');
            $table->string('password');
            $table->unsignedBigInteger('TypeServiceID');
            $table->foreign('TypeServiceID')->references('id')->on('typeservice')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparateur');
    }
};
