<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate:refresh --path=database/migrations/2024_03_10_070431_create_customers_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->string('customer_no');
            $table->string('customer_name');
            $table->string('business_name');
            $table->string('email')->nullable();
            $table->string('location_code')->nullable();
            $table->string('location_longitude')->nullable();
            $table->string('location_latitude')->nullable();
            $table->longText('link_map')->nullable();
            $table->string('zone_name')->nullable();
            $table->string('houes_no')->nullable();
            $table->string('add_streed')->nullable();
            $table->string('vatin')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('village')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('title')->nullable();
            $table->string('fee')->nullable();
            $table->string('vat')->nullable();
            $table->string('vat_amount')->nullable();
            $table->string('total_fee')->nullable();
            $table->string('currency')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('collector')->nullable();
            $table->date('collection_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
