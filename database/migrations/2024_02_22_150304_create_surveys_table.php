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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('branch_id');
            $table->integer('staff_id');
            $table->integer('customer_id')->nullable();
            $table->string('trans_no')->nullable();
            $table->date('survey_date')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('block')->nullable();
            $table->string('sector')->nullable();
            $table->string('street_no')->nullable();
            $table->string('side_of_street')->nullable();
            $table->string('zone_name')->nullable();
            $table->string('start_piont')->nullable();
            $table->string('end_piont')->nullable();
            $table->string('add_street')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('village')->nullable();
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
        Schema::dropIfExists('surveys');
    }
};
