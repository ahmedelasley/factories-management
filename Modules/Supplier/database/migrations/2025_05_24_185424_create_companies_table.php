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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            //name
            $table->string('name')->unique();
            //email
            $table->string('email')->unique()->nullable();
            //phone
            $table->string('phone')->nullable();
            //address
            $table->string('address')->nullable();
            // suupplier_id
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->nullOnDelete();
            // notes
            $table->text('notes')->nullable();

            $table->enum(
                'status',
                array_column(Status::cases(), 'value')
            )->default(Status::cases()[0]->value);
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
        Schema::dropIfExists('companies');
    }
};
