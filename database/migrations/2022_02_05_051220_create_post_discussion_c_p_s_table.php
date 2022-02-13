<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostDiscussionCPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_discussion_c_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('Id_user');
            $table->string('Username');
            $table->string('Key_Post');
            $table->string('Title_Post');
            $table->string('Question_Post');
            $table->string('Language_Programming');
            $table->string('Image_Project_Post')->nullable();
            $table->longText('Url_Image_Project_Post')->nullable();
            $table->string('Image_Code_Post')->nullable();
            $table->longText('Url_Image_Code_Post')->nullable();
            $table->longText('Coding_Post')->nullable();
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
        Schema::dropIfExists('post_discussion_c_p_s');
    }
}
