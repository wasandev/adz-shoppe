<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->char('order_header_no', 15)->unique();
            $table->dateTime('order_header_date');
            $table->char('customer_code', 10);
            $table->string('cname', 255);
            $table->char('customer_recive_code', 10);
            $table->string('sname', 255);
            $table->char('car_registe', 20)->nullable();
            $table->string('branchname', 255);
            $table->string('branchphone', 50);
            $table->char('order_status', 1);
            $table->string('amphur_name', 255);
            $table->string('province_name', 255);
            $table->timestamps();
            $table->increments('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
