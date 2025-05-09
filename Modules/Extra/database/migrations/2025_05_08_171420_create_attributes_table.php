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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attribute')->unique();
            $table->enum(
                'status',
                array_column(Status::cases(), 'value')
            )->default(Status::cases()[0]->value);
            $table->morphs('creator'); // Created By
            $table->nullableMorphs('updater'); // Updated By
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
