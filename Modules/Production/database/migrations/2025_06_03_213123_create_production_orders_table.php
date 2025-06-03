<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Modules\Production\Enums\ProductionStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('production_orders', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('product'); // Product By
            $table->decimal('quantity', 8, 4)->default(1);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->enum(
                'status',
                array_column(ProductionStatus::cases(), 'value')
            )->default(ProductionStatus::cases()[0]->value);

            $table->text('notes')->nullable();

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
        Schema::dropIfExists('production_orders');
    }
};
