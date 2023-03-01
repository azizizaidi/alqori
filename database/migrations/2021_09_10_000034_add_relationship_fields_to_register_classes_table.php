<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegisterClassesTable extends Migration
{
    public function up()
    {
        Schema::table('register_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('class_type_id');
            $table->foreign('class_type_id', 'class_type_fk_4796455')->references('id')->on('class_types');
            $table->unsignedBigInteger('class_name_id');
            $table->foreign('class_name_id', 'class_name_fk_4796456')->references('id')->on('class_names');
            $table->unsignedBigInteger('class_package_id');
            $table->foreign('class_package_id', 'class_package_fk_4796457')->references('id')->on('class_packages');
            $table->unsignedBigInteger('class_numer_id');
            $table->foreign('class_numer_id', 'class_numer_fk_4796458')->references('id')->on('class_numbers');
        });
    }
}
