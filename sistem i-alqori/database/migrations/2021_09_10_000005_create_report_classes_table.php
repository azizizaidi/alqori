<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportClassesTable extends Migration
{
    public function up()
    {
        Schema::create('report_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->integer('total_hour');
            $table->string('month')->nullable();
            $table->integer('allowance')->nullable();
            $table->string('record_student')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
