<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('title', 255)->nullable();
            // $table->string('project_image', 255);
            $table->json('project_image')->nullable();
            $table->text('roofandgutterdesign')->nullable();
            $table->string('rooftypeandrating', 255)->nullable();
            $table->string('guttertypeaccessories', 255)->nullable();
            $table->string('guttertypeaccessories1', 255)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('insurance_company', 255)->nullable();
            $table->string('insurance_agency', 255)->nullable();
            $table->string('billing', 255)->nullable();
            $table->string('mortgage_company', 255)->nullable();
            $table->enum('project_status', ['Approve', 'Request', 'Rejected'])->default('Request');
            $table->integer('status')->default(0);
            $table->timestamps(); 
            $table->timestamp('created_by')->nullable();
            $table->timestamp('updated_by')->nullable();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
