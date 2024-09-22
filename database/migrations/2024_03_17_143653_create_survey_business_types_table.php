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
        Schema::create('survey_business_types', function (Blueprint $table) {
            $table->id();
            $table->integer('survey_detail_id');
            $table->integer('business_type_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('multiply');
            $table->decimal('land_filed_fee', 25, 2);
            $table->decimal('monthly_fee', 25, 2);
            $table->decimal('grand_total', 25, 2);
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
        Schema::dropIfExists('survey_business_types');
    }
};
