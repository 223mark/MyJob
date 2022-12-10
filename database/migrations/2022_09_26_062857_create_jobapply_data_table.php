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
        Schema::create('jobapply_data', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('job_id');
            $table->string('name');
            $table->string('status')->nullable();
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('job_id');
            $table->string('email');
            $table->string('image');
            $table->integer('phone_number');
            $table->longText('address');
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
        Schema::dropIfExists('jobapply_data');
    }
};
