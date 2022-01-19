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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name',100);
            $table->string('last_name',100)->nullable();
            $table->string('email',100);
            $table->unsignedTinyInteger('email_verified')->default(0)->comment("0->Not verified,1->Verified");
            $table->unsignedDecimal('wallet_balance',8,2)->default(0);
            $table->unsignedTinyInteger('newsletter')->default(1)->comment("1->Yes,2->No");
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
