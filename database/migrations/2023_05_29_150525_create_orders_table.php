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
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            // $table->date('order_date');
            $table->string('name', '50');
            $table->string('phone', '50');
            $table->string('category_id');
            $table->string('total_product', '50');
            $table->enum('status',['Pending','Delivered','Complete','Cancelled'])->default('Pending');
            $table->foreign('product_id')->references('id')->on('products');
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
