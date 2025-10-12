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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->date('date');
            $table->time('start_time');
            $table->unsignedSmallInteger('quota');
            $table->text('zoom_link')->nullable();
            $table->text('zoom_id')->nullable();
            $table->text('zoom_password')->nullable();
            $table->text('youtube_link')->nullable();
            $table->string('certificate')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('lecturer_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->unique(['date', 'start_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
