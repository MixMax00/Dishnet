<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBillCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_bill_collections', function (Blueprint $table) {
            $table->id();
            $table->string('sp_id',255)->nullable();
            $table->foreignId('package_id')->default(0);
            $table->integer('collection')->default(0);
            $table->integer('due')->default(0);
            $table->integer('cash_handover')->default(0);
            $table->date('date')->nullable();
            $table->text('explanation')->nullable();
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
        Schema::dropIfExists('admin_bill_collections');
    }
}
