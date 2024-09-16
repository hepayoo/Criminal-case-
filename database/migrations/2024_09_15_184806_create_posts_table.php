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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Reference to the user (assumed to have a 'users' table)
            $table->string('full_name');
            $table->string('victim_name');
            $table->text('description');
            $table->string('victim_image')->nullable();
            $table->string('case_image')->nullable();
            $table->string('case_video')->nullable();
            $table->string('case_file')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
