<?php

use App\Enums\Status;
use App\Enums\Type;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->cascadeOnUpdate()->nullOnDelete();
            $table->enum(
                'type',
                array_column(Type::cases(), 'value')
            )->default(Type::NONE->value);
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
        Schema::dropIfExists('categories');
    }
};
