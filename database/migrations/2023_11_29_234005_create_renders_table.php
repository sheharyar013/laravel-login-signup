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
        Schema::create('renders', function (Blueprint $table) {
            $table->id();
            $table->text('order_id')->nullable();
            $table->text('image_id');
            $table->string('service_name');
            $table->string('user_id');
            $table->text('before_src');
            $table->text('after_src');
            $table->boolean('regenerated');
            $table->string('style');
            $table->string('color')->nullable();
            $table->string('type');
            $table->string('requested_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renders');
    }
};