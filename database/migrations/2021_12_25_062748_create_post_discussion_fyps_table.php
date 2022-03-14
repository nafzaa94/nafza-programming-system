<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostDiscussionFypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_discussion_fyps', function (Blueprint $table) {
            $table->id();
            $table->string('Id_user');
            $table->string('Username');
            $table->string('Avatar');
            $table->string('Key_Post');
            $table->string('Title_Post');
            $table->string('Question_Post');
            $table->string('Language_Programming');
            $table->string('Image_Post')->nullable();
            $table->longText('Url_Post_Image')->nullable();
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
        Schema::dropIfExists('post_discussion_fyps');
    }
}
