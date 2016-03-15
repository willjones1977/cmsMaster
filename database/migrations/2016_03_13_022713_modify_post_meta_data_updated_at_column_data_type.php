<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPostMetaDataUpdatedAtColumnDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_meta_data', function ($table){
            DB::raw("ALTER TABLE `post_meta_data` CHANGE `updated_at`  `updated_at` DATETIME NULL DEFAULT NULL");
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
