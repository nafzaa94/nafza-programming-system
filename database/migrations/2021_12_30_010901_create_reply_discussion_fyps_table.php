<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyDiscussionFypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_discussion_fyps', function (Blueprint $table) {
            $table->id();
            $table->string('Id_user');
            $table->string('Username');
            $table->string('Key_reply');
            $table->string('Reply');
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
        Schema::dropIfExists('reply_discussion_fyps');
    }
}
