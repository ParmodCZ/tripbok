<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_number');
            $table->string('type');
            $table->string('model')->nullable();
            $table->bigInteger('seats')->nullable();
            $table->bigInteger('price_pr_km')->nullable()->comment = 'price per Km In dollar($)';
            $table->bigInteger('price_pr_min')->nullable()->comment = 'price per min In dollar($)';
            $table->bigInteger('mini_fare')->nullable()->comment = 'In dollar($)';
            $table->bigInteger('commission')->nullable()->comment = 'In hour(hr)';
            $table->bigInteger('passenger_cancellation_time')->nullable()->comment = 'In hour(hr)';
            $table->bigInteger('passenger_cancellation_charges')->nullable()->comment = 'In dollar($)';
            $table->dateTime('insurance_renewal_date');
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
        Schema::dropIfExists('vehicles');
    }
}
