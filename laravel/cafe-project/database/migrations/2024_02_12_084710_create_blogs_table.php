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
        //สามารถปรับแต่งตารางได้ในนี้
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //'title' : ชื่อ column, string() : ประเภทของ column
            $table->text('content'); 
            $table->boolean('status')->default(true); // set default
            $table->timestamps(); //time generate
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
