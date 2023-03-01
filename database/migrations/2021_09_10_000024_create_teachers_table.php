<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->integer('phone');
            $table->string('address');
            $table->string('position');
            $table->string('sex');
            $table->string('bank_name')->nullable();
            $table->integer('account_bank')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
