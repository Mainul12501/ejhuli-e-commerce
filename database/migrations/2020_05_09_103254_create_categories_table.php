<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('category_slug');
            $table->string('description')->nullable();
            $table->string('icon_class')->nullable()->comment('Font awesom icon class');
            $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active,2=>Inactive,3=>Deleted');
            $table->unsignedTinyInteger('navigation')->default(1)->comment("1=>Show in navigation menu,2=>Don't show");
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
        Schema::dropIfExists('categories');
    }
}
