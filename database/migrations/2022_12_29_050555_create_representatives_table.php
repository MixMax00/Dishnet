<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('sp_id');
            $table->string('employee_id',255)->nullable();
            $table->string('employee_name',255)->nullable();
            $table->string('employee_designation',255)->nullable();
            $table->string('cell_number',255)->nullable();
            $table->string('pin',255)->default(\Illuminate\Support\Facades\Hash::make('1234'));
            $table->string('image',255)->nullable();
            $table->json('responsible_area')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('fcm_token')->default('12345677889787dsfsdkhfsdkjfgsgfbsnfb');
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
        Schema::dropIfExists('representatives');
    }
}
