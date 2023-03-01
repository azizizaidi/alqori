<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssignClassTeachersTable extends Migration
{
    public function up()
    {
        Schema::table('assign_class_teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id', 'teacher_fk_4804417')->references('id')->on('users');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_fk_4804418')->references('id')->on('users');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id', 'class_fk_4804420')->references('id')->on('register_classes');
        });
    }
}
