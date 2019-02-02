<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonearea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zone_id')->unsigned();
            $table->char('province_code', 5);
            $table->char('amphur_code', 5);
            $table->integer('province_id')->unsigned();
            $table->integer('amphur_id')->unsigned();
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
        Schema::dropIfExists('zonearea');
    }
}
