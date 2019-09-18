<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_type')->nullable();
            $table->bigInteger('fare_pr_km')->nullable()->comment = 'fare per Km In dollar($)';
            $table->bigInteger('minimum_fare')->nullable()->comment = 'minimum fare In dollar($)';
            $table->bigInteger('minimum_distance')->nullable()->comment = 'minimum distance In Km';
            $table->bigInteger('waiting_fare')->nullable()->comment = 'waiting fare In dollar($)';
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
        Schema::dropIfExists('fares');
    }
}
