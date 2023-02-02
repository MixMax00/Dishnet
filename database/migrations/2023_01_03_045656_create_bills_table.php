<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_id');
            $table->string('sp_id');
            $table->string('em_id')->nullable();
            $table->string('customer_id');
            $table->string('month');
            $table->string('year');
            $table->integer('service_charge')->default(0);
            $table->integer('paid_amount');
            $table->date('payment_date')->nullable();
            $table->tinyInteger('payment_method')->default(0);
            $table->tinyInteger('payment_status')->default(0);
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
        Schema::dropIfExists('bills');
    }
}
