<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateArticlesMakeMostFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('year')->unsigned()->nullable()->change();
            $table->string('doi',64)->nullable()->change();
            $table->string('page', 16)->unsigned()->nullable()->change();
            $table->integer('year')->unsigned()->nullable()->change();
            $table->integer('month')->unsigned()->nullable()->change();
            $table->integer('day')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('year')->unsigned()->nullable(false)->change();
            $table->string('doi',64)->nullable()->change();
            $table->string('page',16)->unsigned()->nullable(false)->change();
            $table->integer('year')->unsigned()->nullable(false)->change();
            $table->integer('month')->unsigned()->nullable(false)->change();
            $table->integer('day')->unsigned()->nullable(false)->change();
        });
    }
}
