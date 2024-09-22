<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate:refresh --path=database/migrations/2024_08_29_150739_create_pre_survey_files_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_survey_files', function (Blueprint $table) {
            $table->id();
            $table->integer('pre_survey_id');
            $table->string('name');
            $table->string('full_path');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('delete_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_survey_files');
    }
};
