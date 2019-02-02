<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchZoneTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_zone', function (Blueprint $table) {
            $table->char('branch_code', 3);
            $table->char('province_code', 5);
            $table->char('amphur_code', 5);
            $table->integer('area_no')->nullable();
            $table->increments('id');
            $table->integer('branch_id')->unsigned();
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
        Schema::dropIfExists('branch_zone');
    }
}
