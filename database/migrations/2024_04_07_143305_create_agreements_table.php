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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id');
            $table->integer('staff_id');
            $table->string('customer_no');
            $table->string('agreement_no');
            $table->string('customer_name');
            $table->string('business_name');
            $table->string('location_code')->nullable();
            $table->string('attach')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('title')->nullable();
            $table->string('fee')->nullable();
            $table->string('vat')->nullable();
            $table->string('vat_amount')->nullable();
            $table->string('total_fee')->nullable();
            $table->string('currency')->nullable();
            $table->string('collection_day')->nullable();
            $table->string('make_at')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('month_of_agr')->nullable();
            $table->string('wast_collect_per_week')->nullable();
            $table->boolean('monday')->default(false);
            $table->boolean('tuesday')->default(false);
            $table->boolean('wednesday')->default(false);
            $table->boolean('thursday')->default(false);
            $table->boolean('friday')->default(false);
            $table->boolean('saturday')->default(false);
            $table->boolean('sunday')->default(false);
            $table->date('agreement_date')->nullable();
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
        Schema::dropIfExists('agreements');
    }
};
