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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->char('nik', 18)->nullable()->unique();
            $table->string('photo')->nullable();
            $table->string('phone', 13)->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('institution')->nullable();
            $table->string('department')->nullable();
            $table->text('cv')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('google_id')->nullable()->unique();
            $table->string('password')->nullable();
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
