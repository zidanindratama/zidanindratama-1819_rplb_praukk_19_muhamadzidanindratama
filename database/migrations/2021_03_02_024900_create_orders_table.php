<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('customer_email')->nullable();
            $table->string('customer_first_name');
			$table->string('customer_last_name');
            $table->string('customer_phone')->nullable();
            $table->integer('no_meja');
            $table->string('keterangan');
            $table->string('status');
            $table->datetime('order_date');
            $table->datetime('payment_due');
            $table->string('payment_status');
            $table->decimal('base_total_price', 16, 2)->default(0);
            $table->decimal('tax_amount', 16, 2)->default(0);
            $table->decimal('tax_percent', 16, 2)->default(0);
            $table->string('payment_token')->nullable();
            $table->string('payment_url')->nullable();
            $table->decimal('grand_total', 16, 2)->default(0);
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
        Schema::dropIfExists('orders');
    }
}
