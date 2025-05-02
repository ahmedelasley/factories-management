<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('key')->unique();
            $table->text('value')->nullable();
            // $table->string('data_type')->default('string'); // Data Type (string, integer, boolean, text, json)
            $table->enum('data_type', ['string', 'integer', 'boolean', 'text', 'json'])->default('string')->comment('Data Type (string, integer, boolean, text, json)'); // Data Type (string, integer, boolean, text, json)
            $table->string('description')->nullable()->comment('Description'); // Description
            $table->string('icon')->nullable()->comment('icon'); // Name
            $table->tinyInteger('type')->default(0)->comment("Type (0 = General, 1 = System, 2 = User, 3 = Role, 4 = Permission, 5 = Module, 6 = Theme, 7 = Language, 8 = Custom)"); // Type (0 = General )
            $table->tinyInteger('status')->default(1)->comment('Status (0 = Inactive, 1 = Active)'); // Status (0 = Inactive, 1 = Active)
            $table->morphs('creator'); // Created By
            $table->nullableMorphs('updater'); // Updated By



            // $table->unsignedBigInteger('created_id')->nullable();
            // $table->foreign('created_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('updated_id')->nullable();
            // $table->foreign('updated_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
