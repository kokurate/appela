<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('level')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('can_jaringan')->default(0);
            $table->boolean('can_server')->default(0);
            $table->boolean('can_sistem_informasi')->default(0);
            $table->boolean('can_website_unima')->default(0);
            $table->boolean('can_lms')->default(0);
            $table->boolean('can_ijazah')->default(0);
            $table->boolean('can_slip')->default(0);
            $table->boolean('can_lain_lain')->default(0);
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
