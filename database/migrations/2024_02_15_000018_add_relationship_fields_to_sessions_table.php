<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('next_session_id')->nullable();
            $table->foreign('next_session_id', 'next_session_fk_9492133')->references('id')->on('sessions');
            $table->unsignedBigInteger('landing_page_id')->nullable();
            $table->foreign('landing_page_id', 'landing_page_fk_9503536')->references('id')->on('landing_pages');
        });
    }
}
