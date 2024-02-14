<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['Active', 'Inactive']);
            $table->string('remember_token', 100)->nullable();
            $table->string('contact_number', 15);
            $table->string('profile_image', 255)->nullable();
            $table->string('zip_code', 10);
            $table->string('company_name', 255)->nullable();
            $table->text('contractor_portfolio')->nullable();
            $table->string('facebook_id', 255)->nullable();
            $table->string('google_id', 255)->nullable();
            $table->timestamps();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}


