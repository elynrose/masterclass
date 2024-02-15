<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('excerpt');
            $table->longText('topics')->nullable();
            $table->longText('course_details')->nullable();
            $table->longText('zoom_link');
            $table->date('date');
            $table->time('time');
            $table->string('cadence');
            $table->string('frequency');
            $table->integer('duration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
