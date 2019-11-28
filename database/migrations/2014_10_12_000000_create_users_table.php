<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('street_address')->nullable();
            $table->unsignedInteger('division_id')->nullable()->comment('Division table ID');
            $table->unsignedInteger('district_id')->nullable()->comment('District table ID');
            $table->unsignedTinyInteger('status')->default(0)->comment('0=inactive,1=active,2=ban');
            $table->string('avatar')->nullable();
            $table->text('shipping_address')->nullable();

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
        Schema::dropIfExists('users');
    }
}
