<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            $table->string('site_name')->nullable();

            $table->string('logo')->nullable();

            $table->string('favicon')->nullable();

            $table->text('footer_text')->nullable();

            $table->string('seo_title')->nullable();

            $table->text('seo_description')->nullable();

            $table->string('contact_email')->nullable();

            $table->string('facebook')->nullable();

            $table->string('instagram')->nullable();

            $table->string('twitter')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};