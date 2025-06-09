<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Status;
use Modules\Warehouse\Enums\WarehouseType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->text('location')->nullable();
            $table->decimal('capacity', 12, 4)->nullable()->comment('الطاقة التخزينية القصوى إن لزم');
            // $table->tinyInteger('is_default')->nullable(); // Type (0 = Not Default, 1 = Defualt )
            $table->boolean('is_default')->default(false);

            $table->nullableMorphs('employeeable'); // Employee By

            $table->enum(
                'type',
                array_column(WarehouseType::cases(), 'value')
            )->default(WarehouseType::cases()[0]->value);
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
        Schema::dropIfExists('warehouses');
    }
};
