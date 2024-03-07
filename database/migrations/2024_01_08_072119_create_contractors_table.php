<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('contact_no', 15)->nullable();
            $table->string('profile_image')->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('company_name')->nullable();
            $table->text('contractor_portfolio')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contractors');
    }
}
