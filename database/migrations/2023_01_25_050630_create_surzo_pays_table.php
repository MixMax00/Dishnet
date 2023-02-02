<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurzoPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surzo_pays', function (Blueprint $table) {
            $table->id();
            $table->string('sp_id');
            $table->string('merchant_username')->default('abc');
            $table->string('merchant_password')->default('abc');
            $table->string('engine_url')->default('abc');
            $table->string('prefix')->default('abc');
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
        Schema::dropIfExists('surzo_pays');
    }
}
