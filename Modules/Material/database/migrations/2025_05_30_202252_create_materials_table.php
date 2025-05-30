<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->unique();
            $table->string('slug')->unique()->index();
            $table->text('description')->nullable();

            $table->string('storage_unit')->nullable();
            $table->string('ingredient_unit')->nullable();
            $table->decimal('conversion_factor', 8, 4)->default(1);
            $table->timestamp('last_updated')->nullable();

            $table->enum(
                'status',
                array_column(Status::cases(), 'value')
            )->default(Status::cases()[0]->value);
            $table->morphs('creator'); // Created By
            $table->nullableMorphs('editor'); // Updated By


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
