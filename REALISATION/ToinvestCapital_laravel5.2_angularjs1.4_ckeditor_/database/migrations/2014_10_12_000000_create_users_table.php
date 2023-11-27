<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 150);
            $table->string('avatar', 50)->nullable()->default('avatar.png');
            $table->string('email', 50)->unique();
            $table->string('phone', 25);
            $table->text('story')->nullable();
            $table->boolean('deleted')->default(FALSE);
            $table->boolean('is_admin')->default(FALSE);
            $table->string('password', 255);

            $table->integer('account_id')->unsigned()->index();

            //$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
