<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
            $table->string('name', 250);
            $table->string('teacher_image', 250)->nullable();
            $table->string('std_id')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 250);
            $table->enum('role', ['admin', 'user','teacher'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        $users = [
            [
                'name'       => 'Admin User',
                'std_id'     => '56546',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('123456'),
                'role'       => 'admin',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($users);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};