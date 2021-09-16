<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_settings', function (Blueprint $table) {
            $table->id();
            $table->text('church_name');
            $table->text('assembly_name');
            $table->string('church_logo');
            $table->text('church_box_no');
            $table->text('church_location');
            $table->text('church_phone');
            $table->text('church_email')->nullable();
            $table->text('church_website')->nullable();
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
        Schema::dropIfExists('church_settings');
    }
}
