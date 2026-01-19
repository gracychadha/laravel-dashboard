<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseUsSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsSectionController extends Controller
{
    public function index()
    {
        $section = WhyChooseUsSection::firstOrCreate(
            ['id' => 1],
            [
                'sub_title' => 'Why Choose Us?',
                'main_title' => 'Why Continuity Care Labs?',
                'description_1' => 'Default description...',
                'big_card_value' => '10+',
                'big_card_description' => 'Years of Excellence',
                'small_card_1_title' => 'Advanced Technology',
                'small_card_2_title' => 'Expert Team',
                'small_card_3_title' => 'Fast Results',
                'small_card_4_title' => 'Trusted by Thousands',
                'is_active' => true,
            ]
        );

        return view('admin.pages.whychooseus-section', compact('section'));
    }

    public function update(Request $request, WhyChooseUsSection $section)
    {
        $validated = $request->validate([
            'sub_title' => 'required|string|max:255',
            'main_title' => 'required|string|max:255',
            'description_1' => 'required|string',
            'description_2' => 'nullable|string',
            'big_card_value' => 'required|string|max:50',
            'big_card_description' => 'required|string|max:255',
            'small_card_1_title' => 'required|string|max:255',
            'small_card_2_title' => 'required|string|max:255',
            'small_card_3_title' => 'required|string|max:255',
            'small_card_4_title' => 'required|string|max:255',
            'big_card_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'small_card_1_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'small_card_2_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'small_card_3_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'small_card_4_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'is_active' => 'sometimes|in:1,0,on,off',
        ]);

        // Handle Big Card Image
        if ($request->hasFile('big_card_image')) {
            if ($section->big_card_image) {
                Storage::disk('public')->delete($section->big_card_image);
            }
            $validated['big_card_image'] = $request->file('big_card_image')->store('whychooseus', 'public');
        }

        // Handle Small Cards Images
        for ($i = 1; $i <= 4; $i++) {
            $field = "small_card_{$i}_image";
            if ($request->hasFile($field)) {
                if ($section->$field) {
                    Storage::disk('public')->delete($section->$field);
                }
                $validated[$field] = $request->file($field)->store('whychooseus', 'public');
            }
        }

        // Handle checkbox
        $validated['is_active'] = $request->has('is_active');

        $section->update($validated);

        return back()->with('success', 'Why Choose Us section updated successfully!');
    }
}