<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('about_section_twos', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);

            // Text Content
            $table->string('sub_title')->nullable();
            $table->string('main_title')->nullable();
            $table->text('description_1')->nullable();
            $table->text('description_2')->nullable();

            // Founded Year Box
            $table->string('founded_year')->default('1990');
            $table->string('founded_image')->nullable(); // icon-about-4.png

            // Main Images
            $table->string('image_top')->nullable();     // about-2-1.jpg
            $table->string('image_bottom')->nullable();   // about-2-2.jpg

            // Background Shapes (optional)
            $table->string('shape_1')->nullable(); // about-shape-3.png
            $table->string('shape_2')->nullable(); // about-shape-4.png

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_section_twos');
    }
};
