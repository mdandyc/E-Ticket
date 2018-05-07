<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('address',100);
            $table->string('phone',14);
            $table->string('gender',10);
            $table->string('user_id',25);
            $table->foreign('user_id')->references('username')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('transportation_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',20);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('transportation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',20);
            $table->string('description',40);
            $table->string('seat_qty',10);
            $table->integer('transportation_type_id')->unsigned();
            $table->foreign('transportation_type_id')->references('id')->on('transportation_type')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('rute', function (Blueprint $table) {
            $table->increments('id');
            $table->string('depart_at',40);
            $table->string('rute_form',40);
            $table->string('rute_to',40);
            $table->string('price',20);
            $table->integer('transportation_id')->unsigned();
            $table->foreign('transportation_id')->references('id')->on('transportation')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reservation_code',10);
            $table->string('reservation_at',40);
            $table->string('reservation_date',40);
            $table->integer('costumer_id')->unsigned();
            $table->foreign('costumer_id')->references('id')->on('costumer')->onDelete('cascade');
            $table->string('seat_code',8);
            $table->integer('rute_id')->unsigned();
            $table->foreign('rute_id')->references('id')->on('rute')->onDelete('cascade');
            $table->string('user_id',25);
            $table->foreign('user_id')->references('username')->on('users')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('costumer');
        Schema::dropIfExists('transportation_type');
        Schema::dropIfExists('transportation');
        Schema::dropIfExists('rute');
        Schema::dropIfExists('reservation');
    }
}
