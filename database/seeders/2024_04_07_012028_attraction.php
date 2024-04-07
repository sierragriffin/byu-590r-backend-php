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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('name');
            #$table->string('description');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attractions', function (Blueprint $table) {
            // The exact name of the foreign key constraint follows a certain format
            // If you haven't explicitly named it, Laravel assumes a default name based on the table and column names
            $table->dropForeign(['city_id']); // Use the column name to reference the constraint
        });
    
        Schema::dropIfExists('attractions');
    }
};
