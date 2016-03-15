<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_meta_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->integer('post_id');
            $table->string('title');
            $table->integer('active');
            $table->dateTime('publish_date_time');
            $table->dateTime('deleted_at');
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
        Schema::drop('post_meta_data');
    }
}
