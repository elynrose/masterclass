<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email_address');
            $table->string('phone_number')->nullable();
            $table->integer('provided_phone')->nullable();
            $table->integer('signed_up')->nullable();
            $table->integer('read_page_contents')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
