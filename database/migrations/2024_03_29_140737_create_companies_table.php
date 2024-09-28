<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_kh');
            $table->string('name_en');
            $table->string('company_logo')->nullable();
            $table->string('address_kh')->nullable();
            $table->string('address_en')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('delete_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
        DB::table('companies')->insert(
            [
                'company_logo'=>'WASTIE-LOGO.png',
                'name_en'=>'Wastie Collection',
                'name_kh'=>'ក្រុមហ៊ុន វីសធី ខូលិកសិន',
                'name_en'=>'Wastie Collection',
                'address_kh'=>'ព្រះសីហនុ',
                'address_en'=>'SHV',
                'phone_number'=>'012356956',
                'email'=>'example@gmail.com',
                'website'=>'www.wastie.com.kh',
                'created_at'=>now(),
                'updated_at'=>now(),
                'created_by'=> Auth::id(),
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
