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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->integer('surface');
            $table->integer('prix');
            $table->string('description');
            $table->integer('pieces');
            $table->integer('chambres');
            $table->integer('etages');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('images')->nullable();
            $table->boolean('vendu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
