<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', '50')->nullable();
            $table->string('phone', '50')->nullable();
            $table->string('category_id');
            $table->string('brand_id');
            $table->unsignedBigInteger('product_id')->index();
            $table->string('total_product', '50');
            $table->enum('status',['Pending','Delivered','Complete','Cancelled'])->default('Pending');
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
        Schema::dropIfExists('customers');
    }
}
