<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_locations', function (Blueprint $table) {
            $table->id();
            $table->string('sp_id');
            $table->string('area_location_id')->nullable();
            $table->string('area')->nullable();
            $table->string('area_location_name')->nullable();
            $table->text('description')->nullable();
            $table->string('area_location_code')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('area_locations');
    }
}
