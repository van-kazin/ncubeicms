<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string('name');
            $table->string('image');
            $table->date('birthdate');
            $table->string('member_id')->unique();
            $table->string('gender');
            $table->json('language');
            $table->string('houseaddress')->nullable();
            $table->string('hometown');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('school')->nullable();
            $table->string('pastor');
            $table->string('marital_status');
            $table->string('spouse_name')->nullable();
            $table->string('children')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('nextofkin')->nullable();
            $table->string('educational_level');
            $table->string('employment_status');
            $table->string('profession');
            $table->string('placeofwork')->nullable();
            $table->date('date_enteredchurch')->nullable();
            $table->date('baptism_date')->nullable();
            $table->string('former_church')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
