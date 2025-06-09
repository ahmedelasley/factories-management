<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Modules\Employees\Enums\EmployeeStatus;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('gender', ['male', 'female'])->index();
            $table->string('national_id')->nullable()->unique();
            // $table->foreignId('position_id')->constrained()->onDelete('cascade');
            // $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->date('hire_date')->index();
            $table->string('photo')->nullable();
            $table->enum('status',array_column(EmployeeStatus::cases(), 'value'))
                    ->default(EmployeeStatus::cases()[0]->value)
                    // ->default(EmployeeStatus::Active->value)
                    ->index();

            // ✅ Polymorphic Relations for auditing
            $table->morphs('creator'); // creator_type, creator_id
            $table->nullableMorphs('editor'); // editor_type, editor_id
            $table->nullableMorphs('deletor'); // => deletor_type, deletor_id
            $table->timestamps();
            $table->softDeletes(); // ✅ Soft delete support
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
