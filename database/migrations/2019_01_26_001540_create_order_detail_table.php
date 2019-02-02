<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->char('order_header_no', 15);
            $table->char('product_code', 7);
            $table->integer('order_detail_no')->unsigned();
            $table->decimal('od_qty', 8, 2);
            $table->decimal('od_unit_price', 8, 2);
            $table->char('unit_id', 5);
            $table->string('prdrmk')->nullable();
            $table->integer('id')->unsigned();
            $table->timestamps();
            $table->primary(['order_header_no', 'order_detail_no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
