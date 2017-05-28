<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->nullable();
            $table->string('title');
            $table->mediumText('short_description');
            $table->text('description');
            $table->text('content');
            $table->string('feature_image')->nullable();
            $table->timestamps();
            $table->integer('created_by')->default(-1);
            $table->integer('updated_by')->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('posts', function (Blueprint $table) {
        //     //
        // });
    }
}
