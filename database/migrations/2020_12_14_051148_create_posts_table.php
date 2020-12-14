<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
             $table->integer('user_id')->unsigned()->index()->onDelete('cascade'); //version 1 of pointing foreing key of a table
            //$table->foreignId('user_id')->constrained('users')->onDelete('cascade'); //version 2 of pointing foreing key of a table
            //in here onDelete('cascade') method does is when delete the user posts also get deleted
            $table->text('body');
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
        Schema::dropIfExists('posts');
    }
}
