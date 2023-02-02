<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('sp_id');
            $table->string('customer_id',255)->nullable();
            $table->string('customer_name',255)->nullable();
            $table->string('cell_number',255)->nullable()->unique();
            $table->string('email',255)->nullable();
            $table->string('profession',255)->nullable();
            $table->string('dob',255)->nullable();
            $table->string('nid',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('password',255);
            $table->text('address')->nullable();
            $table->string('package_id')->nullable();
            $table->string('area_id')->nullable();
            $table->string('area_loc_id')->nullable();
            $table->tinyInteger('isAccept')->default(0);
            $table->string('fcm_token')->default('12345677889787dsfsdkhfsdkjfgsgfbsnfb');
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
        Schema::dropIfExists('customers');
    }
}
