<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('certificates', function (Blueprint $table) {
            $table->foreignId('enrollment_id')->primary()->constrained('enrollments');
            $table->foreignId('template_id')->constrained('certificate_templates');
            $table->foreignId('file_id')->nullable()->constrained('files');
            $table->dateTime('issue_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('certificates');
    }
};