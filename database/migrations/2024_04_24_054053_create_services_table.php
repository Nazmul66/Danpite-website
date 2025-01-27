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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_title');
            $table->string('service_slug')->unique();
            
            $table->string('service_img')->nullable();
            $table->text('service_desc');
            $table->string('service_icon')->nullable();
            $table->string('service_percent');
            $table->string('service_color');
            $table->integer('status')->default(1);
            
            
            
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
