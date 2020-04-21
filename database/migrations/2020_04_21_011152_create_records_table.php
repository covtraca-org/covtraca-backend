<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('uid')->unsigned();
            $table->float('long')->nullable();
            $table->float('lat')->nullable();
            $table->boolean('symptoms')->nullable()->default(false);
            $table->boolean('tested')->nullable()->default(false);
            $table->boolean('test_positive')->nullable()->default(false);
            $table->json('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('uid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('records');
    }
}
