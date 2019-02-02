<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->char('customer_code', 10)->unique();
            $table->string('customer_title');
            $table->char('province_code', 5);
            $table->char('amphur_code', 5);
            $table->string('customer_name');
            $table->string('customer_addr1');
            $table->string('customer_addr2')->nullable();
            $table->string('customer_phone');
            $table->string('customer_fax')->nullable();
            $table->string('customer_contact')->nullable();
            $table->datetime('customer_start');
            $table->char('customer_postcode', 10)->nullable();
            $table->string('customer_taxid')->nullable();
            $table->char('customer_flag', 1);
            $table->char('customer_status');
            $table->timestamp('insert_time');
            $table->integer('credit_term')->unsigned()->nullable();
            $table->char('ar_flag', 1);
            $table->decimal('credit_amount', 10, 2)->nullable();
            $table->char('tambol_code', 10)->nullable();
            $table->char('empedit', 10)->nullable();
            $table->string('email')->nullable();
            $table->string('mobilephone')->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('amphur_id')->unsigned()->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('customer');
    }
}
