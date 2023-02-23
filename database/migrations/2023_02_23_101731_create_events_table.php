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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('creator_id');
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('location_id');
            $table->boolean('accepted')->default(0);
        });
    }
    //     id (PK)
    // title (varchar)
    // datetime_start (datetime)
    // datetime_end (datetime)
    // location_id (int)
    // accepted (bool)

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
