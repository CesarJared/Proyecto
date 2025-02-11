<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('uploadlabels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upload_id')->unsigned();
            $table->integer('label_id')->unsigned();
            $table->timestamps();

            $table->foreign('upload_id')->references('id')->on('uploads');
            $table->foreign('label_id')->references('id')->on('labels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
