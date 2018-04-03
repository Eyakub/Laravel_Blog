<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb1_blog', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->integer('category_id');
            $table->string('blog_title');
            $table->string('author_name');
            $table->text('blog_short_description');
            $table->text('blog_long_description');
            $table->string('blog_image');
            $table->tinyInteger('publication_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb1_blog');
    }
}
