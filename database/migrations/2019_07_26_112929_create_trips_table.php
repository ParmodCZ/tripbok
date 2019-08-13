<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->default('booked')->comment = 'active,completed,booked,cancelled';
            $table->boolean('is_confirmed')->default(0);
            $table->bigInteger('driver_id')->nullable();
            $table->bigInteger('passenger_id')->nullable();
            $table->string('from_');
            $table->string('to');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->bigInteger('fare')->nullable()->comment = 'In Doller ($)';
            $table->string('from_lat_long')->nullable();
            $table->string('from_lat')->nullable();
            $table->string('from_long')->nullable();
            $table->string('to_lat_long')->nullable();
            $table->string('to_lat')->nullable();
            $table->string('to_long')->nullable();
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
        Schema::dropIfExists('trips');
    }
}
