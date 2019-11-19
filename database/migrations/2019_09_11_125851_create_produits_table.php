<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_medicament');
            $table->string('forme_pharmaceutique');
            $table->string('excipient');
            $table->string('excipient_notoire')->nullable();
            $table->string('indication');
            $table->string('dosage');
            $table->string('presentation');
            $table->string('conditionnement');
            $table->string('classe_therapeutique');
            $table->string('pght');
            $table->string('manufacturer');
            $table->string('adresse');
            $table->string('email');
            $table->string('phone');
            $table->string('prpt')->nullable();
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('id')->on('demandes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('produits');
    }
}
