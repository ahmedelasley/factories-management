<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Production\Enums\ProductionQualityStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_qualities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_order_id')->nullable()->constrained('production_orders')->nullOnDelete();
            $table->nullableMorphs('employee'); // Employee
            $table->timestamp('date')->nullable();
            $table->text('notes')->nullable();

            $table->enum(
                'status',
                array_column(ProductionQualityStatus::cases(), 'value')
            )->default(ProductionQualityStatus::cases()[0]->value);
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
        Schema::dropIfExists('production_qualities');
    }

};
