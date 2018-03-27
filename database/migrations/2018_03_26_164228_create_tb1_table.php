<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTb1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb1_admin', function (Blueprint $table) {
            $table->increments('admin_id');
            $table->string('admin_name', 50);
            $table->string('email_address', 100);
            $table->string('admin_password', 100);
            $table->string('mobile_number', 14);
            $table->tinyInteger('access_label'); //koek lvl like, admin, super admin, user bla bla
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
        Schema::dropIfExists('tb1_admin');
    }
}
