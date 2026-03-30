<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('training_speaker', function (Blueprint $table) {
             $table->id();
            $table->foreignId('training_id')->constrained('trainings');
            $table->foreignId('speaker_id')->constrained('speakers');
            $table->primary(['training_id', 'speaker_id']);
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('training_speaker');
    }
};