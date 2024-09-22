<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_details', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_id');
            $table->string('location_code')->unique();
            $table->string('location_latitude')->nullable();
            $table->string('location_longitude')->nullable();
            $table->text('link_map')->nullable();
            $table->string('order_of_house');
            $table->string('devide_order');
            $table->string('floor');
            $table->string('position');
            $table->string('house_no')->nullable();
            $table->string('survey_name')->nullable();
            $table->string('business_name');
            $table->decimal('total_amount', 25, 2);
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
        Schema::dropIfExists('survey_details');
    }
};
