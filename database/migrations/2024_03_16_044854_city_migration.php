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
        Schema::dropIfExists('cities');
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('capital_id');
            #$table->integer('attraction_id');
            $table->string('name');
            $table->string('description');
            $table->string('file');
            $table->timestamps();
        });
        
        // id
        // name
        // prefecture_id

        // island_id
        // region_id
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
