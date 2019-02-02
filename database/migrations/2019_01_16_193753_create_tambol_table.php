<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTambolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambol', function (Blueprint $table) {
            $table->char('province_code', 5);
            $table->char('amphur_code', 5);
            $table->char('tambol_code', 10);
            $table->string('tambol_name');
            $table->increments('id');
            $table->integer('province_id')->nullable();
            $table->integer('amphur_id')->nullable();
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
        Schema::dropIfExists('tambol');
    }
}
