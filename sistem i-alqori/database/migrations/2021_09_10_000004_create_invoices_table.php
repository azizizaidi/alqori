<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student')->nullable();
            $table->string('registrar')->nullable();
            $table->string('teacher')->nullable();
            $table->string('class')->nullable();
            $table->string('total_hour')->nullable();
            $table->string('amount_fee')->nullable();
            $table->string('date_class')->nullable();
            $table->string('fee_perhour')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
