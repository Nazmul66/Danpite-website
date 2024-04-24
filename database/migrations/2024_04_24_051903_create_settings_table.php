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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('whatsapp_link')->nullable();
            $table->text('address');
            $table->string('phone');
            $table->string('phone_optional')->nullable();
            $table->string('email');
            $table->string('email_optional')->nullable();
            $table->string('copyright');
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->text('pixel/FB')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('chatbot')->nullable();
            $table->integer('years')->nullable();
            
            $table->integer('team_members')->nullable();
            $table->integer('satisfied_client')->nullable();
            $table->integer('complete_projects')->nullable();
            
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
