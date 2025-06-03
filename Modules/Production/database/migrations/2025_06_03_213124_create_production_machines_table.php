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
        Schema::create('production_machines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('production_order_id')->nullable()->constrained('production_orders')->nullOnDelete();
            $table->nullableMorphs('machine'); // Machine
            $table->decimal('hours_used', 10, 4)->default(0.0000)->unsigned();
            $table->nullableMorphs('creator'); // Created By
            $table->nullableMorphs('editor'); // Updated By
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_machines');
    }
};
