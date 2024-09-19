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
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user (assumed to have a 'users' table)
            $table->string('title');
            $table->string('desc');
            $table->string('imagePath')->nullable();
            $table->string('biography');
            $table->text('murders');
            $table->text('arrests');
            $table->text('sources');
            $table->string('slug')->unique(); // Unique slug for each post
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
        Schema::dropIfExists('crimes');
    }
};