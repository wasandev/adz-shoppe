<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_header', function (Blueprint $table) {
            $table->char('car_registe', 20)->nullable();
            $table->char('order_header_no', 15)->unique();
            $table->char('customer_code', 10);
            $table->char('employee_code', 10);
            $table->char('customer_recive_code', 10);
            $table->dateTime('order_header_date');
            $table->char('order_header_print_one', 1);
            $table->char('order_header_bill_flag', 1);
            $table->char('order_header_cancel_flag', 1);
            $table->char('order_header_recive_flag', 1);
            $table->char('order_header_payment_flag', 1);
            $table->string('waybill_no', 15);
            $table->char('checker', 20);
            $table->char('dbn_flag', 1);
            $table->char('branch_code', 3);
            $table->char('branch_rec', 3);
            $table->date('order_date');
            $table->string('order_rmk')->nullable();
            $table->char('tranflag', 1);
            $table->char('payflag', 1);
            $table->string('brncar', 10)->nullable();
            $table->dateTime('recdate')->nullable();
            $table->string('recname')->nullable();
            $table->char('brnsendflag', 1);
            $table->date('brnrecdate')->nullable();
            $table->char('brnrecflag', 1);
            $table->timestamp('systime');
            $table->char('empedit', 10)->nullable();
            $table->string('brnrecname')->nullable();
            $table->decimal('orderamount', 10, 2);
            $table->decimal('serviceamt', 10, 2);
            $table->char('serviceflag', 1);
            $table->char('servicerecflag', 1);
            $table->string('orderrefno')->nullable();
            $table->string('fromdb')->nullable();
            $table->char('recempcode', 5)->nullable();
            $table->integer('pricetype')->nullable();
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
        Schema::dropIfExists('order_header');
    }
}
