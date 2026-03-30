<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('enrollment_payment', function (Blueprint $table) {
                $table->id();
            $table->foreignId('payment_id')->constrained('payments');
            $table->foreignId('enrollment_id')->constrained('enrollments');
            $table->primary(['payment_id', 'enrollment_id']);
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('enrollment_payment');
    }
};