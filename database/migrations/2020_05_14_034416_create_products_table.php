<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('sku',100);
            $table->unsignedDecimal('regular_price',8,2);
            $table->unsignedDecimal('sale_price',8,2)->nullable();
            $table->integer('stock')->comment('Stock quantity');
            $table->string('unit',100)->comment('Pcs,kgs etc..');
            $table->string('product_image');
            $table->string('product_image_1')->nullable();
            $table->string('product_image_2')->nullable();
            $table->string('product_display',100)->comment('1=>New Arrival,2=>Featured')->nullable();
            $table->text('description');
            $table->text('additional_info')->nullable();
            $table->unsignedDecimal('average_rating',3,2)->default(0);
            $table->unsignedInteger('total_reviews')->default(0);
            $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active,2=>Inactive');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
