<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankaccTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankacc', function (Blueprint $table) {
            $table->char('bacccode', 10);
            $table->string('bankbrn')->nullable();
            $table->string('baccname')->nullable();
            $table->char('bacctype', 1)->nullable();
            $table->char('bankcode', 3);
            $table->increments('id');
            $table->integer('bank_id')->unsigned();
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
        Schema::dropIfExists('bankacc');
    }
}
