<?php

use Carbon\Carbon;
use App\Models\Setting;
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
            $table->string('cover_image', 250)->nullable();
            $table->string('president_designation', 250)->nullable();
            $table->string('trainer_designation', 250)->nullable();
            $table->string('project_name', 250)->nullable();
            $table->string('project_logo', 250)->nullable();
            $table->string('favicon', 250)->nullable();
            $table->string('fb_link', 250)->nullable();
            $table->string('instagram_link', 250)->nullable();
            $table->string('youtube_link', 250)->nullable();
            $table->enum('visibility', ['private', 'public'])->default('private');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Setting::insert([
            'id'                    => 1,
            'president_designation' => 'President',
            'trainer_designation'   => 'Trainer',
            'project_name'          => 'TypingTest',
            'project_logo'          => '/assets/img/typing.png',
            'favicon'               => '/assets/img/computer.png',
            'visibility'            => 'private',
            'status'                => 'active',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};