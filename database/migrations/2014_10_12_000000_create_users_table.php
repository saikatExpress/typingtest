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
            $table->unsignedBigInteger('std_id')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 250);
            $table->enum('role', ['admin', 'user'])->default('user');
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
            [
                'name'       => 'John Doe',
                'std_id'     => '565466',
                'email'      => 'johndoe@gmail.com',
                'password'   => Hash::make('123456'),
                'role'       => 'user',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Jane Smith',
                'std_id'     => '676775',
                'email'      => 'janesmith@gmail.com',
                'password'   => Hash::make('123456'),
                'role'       => 'user',
                'status'     => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Michael Brown',
                'std_id'     => '67676',
                'email'      => 'michaelbrown@gmail.com',
                'password'   => Hash::make('123456'),
                'role'       => 'user',
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Sarah Williams',
                'std_id'     => '676768756',
                'email'      => 'sarahwilliams@gmail.com',
                'password'   => Hash::make('123456'),
                'role'       => 'user',
                'status'     => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ]
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
