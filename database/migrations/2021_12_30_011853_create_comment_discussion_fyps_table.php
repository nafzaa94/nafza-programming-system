<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentDiscussionFypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_discussion_fyps', function (Blueprint $table) {
            $table->id();
            $table->string('Id_user');
            $table->string('Username');
            $table->string('Key_comment');
            $table->string('Key_reply')->nullable();
            $table->string('Comment');
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
        Schema::dropIfExists('comment_discussion_fyps');
    }
}
