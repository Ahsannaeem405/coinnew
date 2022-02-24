<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("add_coins", function (Blueprint $table) {
            $table->text('sol_address')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twi')->nullable();
            $table->text('rec')->nullable();
            $table->text('youtube')->nullable();
            $table->text('insta')->nullable();
            $table->text('chart')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
