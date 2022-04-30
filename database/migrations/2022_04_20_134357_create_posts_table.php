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
            // $table->unsignedBigInteger('user_id')->after('id');
            $table->date('today_date')->nullable(true);
            $table->string('site')->nullable(true);
            $table->time('Working_time')->nullable(true);
            $table->boolean('management')->default(true);
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('user_id')->references('id')->on('users');
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
         Schema::create('posts',function (Blueprint $table){
        //     $table->dropForeign('posts_user_id_foreign');
        //     $table->dropColumn('user_id');
         });
        Schema::dropIfExists('posts');
    }
}
