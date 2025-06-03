<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Production\Enums\ProductionStep;
use Modules\Production\Enums\ProductionStepStatus;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_order_id')->nullable()->constrained('production_orders')->nullOnDelete();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->enum(
                'step',
                array_column(ProductionStep::cases(), 'value')
            )->default(ProductionStep::cases()[0]->value);

            $table->enum(
                'status',
                array_column(ProductionStepStatus::cases(), 'value')
            )->default(ProductionStepStatus::cases()[0]->value);
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
        Schema::dropIfExists('production_steps');
    }
};
