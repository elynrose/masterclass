<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagesTable extends Migration
{
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('register_label');
            $table->string('teacher_name');
            $table->longText('stripe_code')->nullable();
            $table->longText('teacher_bio');
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
