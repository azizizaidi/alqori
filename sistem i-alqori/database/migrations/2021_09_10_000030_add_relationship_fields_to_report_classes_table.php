<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReportClassesTable extends Migration
{
    public function up()
    {
        Schema::table('report_classes', function (Blueprint $table) {
           
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id', 'student_fk_4804650')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_4804656')->references('id')->on('users');
            $table->unsignedBigInteger('class_names_id')->nullable();
            $table->foreign('class_names_id', 'class_fk_4804657')->references('id')->on('class_names');
        });
    }
}
