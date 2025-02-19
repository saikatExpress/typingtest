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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('president_name', 250)->default('president_name')->after('project_name');
            $table->string('president_image', 250)->nullable()->after('president_name');
            $table->string('trainer_name', 250)->default('trainer_name')->after('president_image');
            $table->string('trainer_image', 250)->nullable()->after('trainer_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('president_name');
            $table->dropColumn('president_image');
            $table->dropColumn('trainer_name');
            $table->dropColumn('trainer_image');
        });
    }
};