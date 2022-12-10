<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_jobs', function (Blueprint $table) {
            $table->id();

            $table->integer('company_id');
            //  $table->integer('job_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('status')->nullable();
            $table->string('salary');
            $table->string('tags');
            $table->string('location');
            $table->longText('description');
            $table->string('email');
            $table->string('typeOfJob');
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
        Schema::dropIfExists('list_of_jobs');
    }
};
