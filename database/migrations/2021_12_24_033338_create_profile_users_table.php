<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('fullname');
            $table->string('image_profile')->nullable();
            $table->longText('url_profile_image')->nullable();
            $table->string('address');
            $table->string('no_phone');
            $table->string('gender');
            $table->string('statusdepartment');
            $table->string('department');
            $table->string('projectname');
            $table->string('presendate');
            $table->string('typeproject');
            $table->string('objectiveproject')->nullable();
            $table->string('imageproject')->nullable();
            $table->longText('url_project_image')->nullable();
            $table->string('imagehalfpayment')->nullable();
            $table->string('url_imagehalfpayment')->nullable();
            $table->string('imagefullpayment')->nullable();
            $table->string('url_imagefullpayment')->nullable();
            $table->string('package')->nullable();
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
        Schema::dropIfExists('profile_users');
    }
}
