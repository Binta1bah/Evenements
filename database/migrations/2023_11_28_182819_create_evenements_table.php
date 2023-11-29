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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('description');
            $table->date('dateLimitEvenement');
            $table->foreignId('association_id');
            $table->foreign('association_id')->references('id')->on('associations')->onDelete('cascade');
            $table->date('dateEvenement');
            $table->string('image');
            $table->boolean('is_clotured')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
