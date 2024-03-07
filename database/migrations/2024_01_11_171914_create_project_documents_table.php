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
      
        Schema::create('project_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('document_name', 255);
            $table->string('document_file', 255);
            $table->string('file_keys', 255)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            
            // Foreign key constraints
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
        
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_documents');
    }
};
