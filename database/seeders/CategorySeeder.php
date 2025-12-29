<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Writing Instruments',
                'slug' => 'writing-instruments',
                'color' => '#14b8a6', // Teal
                'icon' => 'heroicon-o-pencil',
                'is_active' => true,
            ],
            [
                'name' => 'Premium Notebooks',
                'slug' => 'premium-notebooks',
                'color' => '#f59e0b', // Amber
                'icon' => 'heroicon-o-book-open',
                'is_active' => true,
            ],
            [
                'name' => 'Desk Accessories',
                'slug' => 'desk-accessories',
                'color' => '#6366f1', // Indigo
                'icon' => 'heroicon-o-computer-desktop',
                'is_active' => true,
            ],
            [
                'name' => 'Art Supplies',
                'slug' => 'art-supplies',
                'color' => '#ec4899', // Pink
                'icon' => 'heroicon-o-paint-brush',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
