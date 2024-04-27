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
            $table->id();
            $table->string('project_cat_name');
            $table->string('project_title');
            $table->string('project_slug');
            $table->string('project_img')->nullable();
            $table->text('project_desc');
            $table->string('project_link')->nullable();
            $table->integer('status')->default('1');

            // $table->foreign('category_id')->references('id')->on('project_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
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