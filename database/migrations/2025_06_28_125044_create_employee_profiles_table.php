<?php

use App\Models\User;
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
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->date('dob');
            $table->integer('experience');
            $table->string('education_level');
            $table->string('linkedin_profile');
            $table->string('github_profile');
            $table->boolean('is_employed')->default(false);
            $table->date('available_from');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
    }
};
