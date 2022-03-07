<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_coins', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('sym')->nullable();
            $table->text('des')->nullable();
            $table->text('telegram')->nullable();
            $table->text('web')->nullable();
            $table->text('address')->nullable();
            $table->text('other')->nullable();
            $table->text('e_c_address')->nullable();
            $table->text('logo_link')->nullable();
            $table->text('act_price')->nullable();
            $table->text('mark_cap')->nullable();
            $table->date('launch_date')->nullable();
            $table->string('image')->nullable();
            $table->string('vote')->nullable();
            $table->string('devote')->nullable();
            $table->string('permote')->nullable();
            $table->string('approve')->nullable();
            $table->string('audit')->nullable();
            $table->string('kyc')->nullable();
            $table->string('cmc')->nullable();
            $table->string('checkbox')->nullable();
            $table->string('address_name')->nullable();
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
        Schema::dropIfExists('add_coins');
    }
}
