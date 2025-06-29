<?php

use App\Models\EmployeeProfile;
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
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('country')->nullable();;
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->integer('experience')->nullable();
            $table->enum('education_level', ['high_school', 'bachelor', 'master', 'phd'])->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->boolean('is_employed')->default(false);
            $table->date('available_from')->nullable();
            $table->timestamps();
        });

        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EmployeeProfile::class);
            $table->string('file_type');
            $table->string('file_path');
            $table->boolean('is_primary')->default(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
        Schema::dropIfExists('employee_documents');
    }
};
