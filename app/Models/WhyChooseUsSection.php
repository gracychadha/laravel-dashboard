<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhyChooseUsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_title',
        'main_title',
        'description_1',
        'description_2',
        'big_card_image',
        'big_card_value',
        'big_card_description',
        'small_card_1_image', 'small_card_1_title',
        'small_card_2_image', 'small_card_2_title',
        'small_card_3_image', 'small_card_3_title',
        'small_card_4_image', 'small_card_4_title',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}