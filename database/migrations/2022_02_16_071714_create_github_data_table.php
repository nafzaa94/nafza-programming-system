<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGithubDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_data', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name_project');
            $table->string('start_time_class')->nullable();
            $table->string('start_date_class')->nullable();
            $table->string('end_time_class')->nullable();
            $table->string('end_date_class')->nullable();
            $table->string('url_github')->nullable();
            $table->string('url_meet')->nullable();
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
        Schema::dropIfExists('github_data');
    }
}
