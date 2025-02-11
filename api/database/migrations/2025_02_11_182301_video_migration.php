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
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uploads_id')->unsigned();
            $table->string('title');
            $table->string('url');
            $table->timestamps();

            $table->foreign('uploads_id')->references('id')->on('uploads');
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
