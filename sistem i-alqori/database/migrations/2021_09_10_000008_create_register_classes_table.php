<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterClassesTable extends Migration
{
    public function up()
    {
        Schema::create('register_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code_class')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
