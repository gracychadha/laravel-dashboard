<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title')->default('About Us');
            $table->text('main_title');
            $table->longText('description_1');
            $table->longText('description_2')->nullable();
            $table->string('image')->nullable();
            $table->string('icon_1')->nullable();
            $table->string('icon_2')->nullable();
            $table->string('feature_1_title');
            $table->text('feature_1_description');
            $table->string('feature_2_title');
            $table->text('feature_2_description');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_sections');
    }
};