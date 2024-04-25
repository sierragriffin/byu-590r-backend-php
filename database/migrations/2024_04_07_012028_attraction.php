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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            // Add other columns as needed
            $table->timestamps();
        });

        Schema::create('city_person', function (Blueprint $table) {
            $table->unsignedBigInteger('maincity_id');
            $table->unsignedBigInteger('person_id');
            $table->primary(['maincity_id', 'person_id']);
            $table->foreign('maincity_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');

            $table->unique(['city_id', 'person_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_person');
        Schema::dropIfExists('people');
    }
};
