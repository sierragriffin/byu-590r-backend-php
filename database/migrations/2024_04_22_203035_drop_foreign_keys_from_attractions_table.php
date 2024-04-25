<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('attractions', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
        });
    }
    
    public function down()
    {
        Schema::table('attractions', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }
};
