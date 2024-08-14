<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('paynumber',8)->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('extension')->nullable();
            $table->string('speeddial', 10)->nullable();
            $table->string('department')->nullable();
            $table->string('leave_days')->nullable();
            $table->string('Salary')->nullable();
            $table->string('hire_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('activated')->default(false);
            $table->string('account_created_by');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
