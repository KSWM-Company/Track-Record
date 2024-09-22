<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate:refresh --path=database/migrations/2024_08_29_150503_create_pre_surveys_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('branch_id');
            $table->integer('block_id');
            $table->integer('sector_id');
            $table->integer('street_id');
            $table->integer('side_of_street_id');
            $table->integer('business_type_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('location_longitude')->nullable();
            $table->string('location_latitude')->nullable();
            $table->longText('link_map')->nullable();
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
        Schema::dropIfExists('pre_surveys');
    }
};
