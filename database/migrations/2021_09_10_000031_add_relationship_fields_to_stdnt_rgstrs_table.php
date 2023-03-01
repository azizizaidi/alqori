<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStdntRgstrsTable extends Migration
{
    public function up()
    {
        Schema::table('stdnt_rgstrs', function (Blueprint $table) {
            $table->unsignedBigInteger('registrar_id');
            $table->foreign('registrar_id', 'registrar_fk_4791276')->references('id')->on('registrars');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id', 'student_fk_4791277')->references('id')->on('students');
        });
    }
}
