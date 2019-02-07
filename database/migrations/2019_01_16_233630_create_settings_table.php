<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logoImagePath');
            $table->string('slogan');
            $table->text('aboutUs');
            $table->text('contactUs');
            $table->string('email');
            $table->string('phone');
            $table->string('mellatTerminalID');
            $table->string('mellatUsername');
            $table->string('mellatPassword');

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
        Schema::dropIfExists('settings');
    }
}
