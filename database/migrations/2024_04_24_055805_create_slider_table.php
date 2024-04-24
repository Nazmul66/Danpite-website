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
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            
            $table->string('slider_title');
            $table->text('slider_desc');
            $table->text('slider_img');
            $table->string('slider_bg')->nullable();
            $table->string('first_btn_link')->nullable();
            $table->string('second_btn_link')->nullable();
            $table->string('slider_type')->comment('about,service,project');
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider');
    }
};
