<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('why_choose_us_sections', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title');
            $table->string('main_title');
            $table->text('description_1');
            $table->text('description_2')->nullable();

            // Big Card
            $table->string('big_card_image')->nullable(); // stores path like "whychooseus/big-card.jpg"
            $table->string('big_card_value');
            $table->string('big_card_description');

            // Small Feature Cards (4 cards)
            $table->string('small_card_1_image')->nullable();
            $table->string('small_card_1_title');

            $table->string('small_card_2_image')->nullable();
            $table->string('small_card_2_title');

            $table->string('small_card_3_image')->nullable();
            $table->string('small_card_3_title');

            $table->string('small_card_4_image')->nullable();
            $table->string('small_card_4_title');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

       
    }

    public function down(): void
    {
        Schema::dropIfExists('why_choose_us_sections');
    }
};