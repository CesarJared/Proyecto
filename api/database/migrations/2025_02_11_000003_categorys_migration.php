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
        Schema :: create ( 'categorys' , function ( Blueprint $table ) {
            $table -> increments ('id');
            $table -> string ( 'category' );
            $table -> string ( 'description' ) -> nullable ();
            $table -> timestamps ();
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
