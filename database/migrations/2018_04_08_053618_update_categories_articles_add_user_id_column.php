<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCategoriesArticlesAddUserIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories_articles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
        });
        Schema::table('categories_articles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories_articles', function (Blueprint $table) {
            $table->dropForeign('categories_articles_user_id_foreign');
        });
        Schema::table('categories_articles', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
