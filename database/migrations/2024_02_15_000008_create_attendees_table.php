<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeesTable extends Migration
{
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('from_email')->nullable();
            $table->integer('from_website')->nullable();
            $table->integer('attended_session')->nullable();
            $table->integer('received_follow_up_email')->nullable();
            $table->integer('viewed_follow_up')->nullable();
            $table->integer('watched_last_session')->nullable();
            $table->integer('invited_to_next_session')->nullable();
            $table->integer('viewed_next_session_email')->nullable();
            $table->integer('signed_up_for_next_session')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
