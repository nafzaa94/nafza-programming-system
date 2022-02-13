<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_projects', function (Blueprint $table) {
            $table->id();
            $table->string('Title_Project');
            $table->string('Link_Video_Project');
            $table->string('Project_From');
            $table->string('Link_File_Project');
            $table->string('FeedbacK_project');
            $table->string('Type_Programming_project');
            $table->string('id_projectfrom_taget');
            $table->string('id_projectfrom');
            $table->string('id_projectlink_taget');
            $table->string('id_projectlink');
            $table->string('id_projecttypeprogramming_taget');
            $table->string('id_projecttypeprogramming');
            $table->string('id_projectfeedback_taget');
            $table->string('id_projectfeedback');
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
        Schema::dropIfExists('story_projects');
    }
}
