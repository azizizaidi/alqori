<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignClassTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('assign_class_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teacher_code');
            $table->string('student_code');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
