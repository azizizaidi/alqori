<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegistrarsTable extends Migration
{
    public function up()
    {
        Schema::table('registrars', function (Blueprint $table) {
            $table->unsignedBigInteger('registrar_id');
            $table->foreign('registrar_id', 'registrar_fk_4791134')->references('id')->on('users');
        });
    }
}
