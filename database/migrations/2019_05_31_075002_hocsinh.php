<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hocsinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('flights', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('anh');
            $table->string('name');
            $table->string('birth');
            $table->string('sex');
            $table->string('address');
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
         Schema::dropIfExists('flights');
         // Schema::rename('flights','hocsinh');

    }
}
