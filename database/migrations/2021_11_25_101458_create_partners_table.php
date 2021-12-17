<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->string('name', 100);
            $table->string('fullname');
            $table->bigInteger('inn');
            $table->bigInteger('ogrn')->nullable();
            $table->bigInteger('kpp')->nullable();
            $table->string('address')->nullable();
            $table->string('head_position', 50)->nullable();
            $table->string('head_name', 30)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email')->nullable();
            $table->string('site', 100)->nullable();
            $table->string('bankname')->nullable();
            $table->integer('bik')->nullable();
            $table->bigInteger('bankaccount')->nullable();
            $table->string('information')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
