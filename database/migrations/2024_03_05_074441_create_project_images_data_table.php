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
        Schema::create('project_images_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->text('project_image'); 
            $table->date('date');
            $table->time('time');
            $table->timestamps(); 
          
            $table->foreign('project_id')->references('id')->on('projects');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_images_data');
    }
};
