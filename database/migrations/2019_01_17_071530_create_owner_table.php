<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner', function (Blueprint $table) {
            $table->char('owner_code', 5);
            $table->string('owner_name');
            $table->string('owner_add1')->nullable();
            $table->string('owner_phone')->nullable();
            $table->char('owner_use_flag', 1)->nullable()->default('U');
            $table->string('owner_mobile')->nullable();
            $table->char('owner_flag', 1)->nullable();
            $table->string('owner_remark')->nullable();
            $table->string('owner_idcode')->nullable();
            $table->string('owner_taxid')->nullable();
            $table->string('usercode')->nullable();
            $table->timestamp('systime')->nullable();
            $table->string('owner_accno')->nullable();
            $table->char('owner_bank', 3)->nullable();
            $table->string('owner_bankbrn')->nullable();
            $table->string('owner_paydate')->nullable();
            $table->string('owner_accname')->nullable();
            $table->increments('id');
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
        Schema::dropIfExists('owner');
    }
}
