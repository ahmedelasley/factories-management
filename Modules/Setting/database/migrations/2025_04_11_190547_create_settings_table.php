<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Setting\Enums\SettingType;
use Modules\Setting\Enums\SettingDataType;
use Modules\Setting\Enums\SettingStatus;

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
            $table->enum('data_type', array_column(SettingDataType::cases(), 'value'))->default(SettingDataType::cases()[0]->value); // Data Type (string, integer, boolean, text, json)
            $table->string('description')->nullable()->comment('Description'); // Description
            $table->string('icon')->nullable()->comment('icon'); // Name
            
            $table->enum(
                'type',
                array_column(SettingType::cases(), 'value')
            )->default(SettingType::cases()[0]->value);
            $table->enum(
                'status',
                array_column(SettingStatus::cases(), 'value')
            )->default(SettingStatus::cases()[0]->value);

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
