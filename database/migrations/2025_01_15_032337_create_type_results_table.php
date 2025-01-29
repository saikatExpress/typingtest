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
        Schema::create('type_results', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('std_id')->nullable();
            $table->integer('gross_wpm')->nullable();
            $table->integer('net_wpm')->nullable();
            $table->string('accuracy', 250)->nullable();
            $table->string('double_words', 250)->nullable();
            $table->text('skipped_words')->nullable();
            $table->text('wrong_words')->nullable();
            $table->enum('typing_category', ['english', 'bangla'])->nullable();
            $table->integer('duration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_results');
    }
};
