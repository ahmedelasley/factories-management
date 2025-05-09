<?php

use App\Enums\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attribute_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->constrained()->onDelete('cascade');
            $table->foreignId('value_id')->constrained()->onDelete('cascade');
            $table->unique(['attribute_id', 'value_id']);

            $table->enum(
                'status',
                array_column(Status::cases(), 'value')
            )->default(Status::cases()[0]->value);

            $table->morphs('creator');
            $table->nullableMorphs('updater');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_value');
    }
};
