<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();

        if ($categories->isEmpty()) {
            return;
        }

        $products = [
            // Writing Instruments
            [
                'category_slug' => 'writing-instruments',
                'name' => 'Urbanist Fountain Pen',
                'slug' => 'urbanist-fountain-pen',
                'sku' => 'PEN-001',
                'description' => 'A sleek, modern fountain pen with a matte black finish and gold accents.',
                'price' => 45.00,
                'cost_price' => 20.00,
                'stock' => 100,
                'is_visible' => true,
                'is_featured' => true,
            ],
            [
                'category_slug' => 'writing-instruments',
                'name' => 'Gel Ink Rollerball Set',
                'slug' => 'gel-ink-rollerball-set',
                'sku' => 'PEN-002',
                'description' => 'Set of 5 smooth-writing gel pens in assorted vibrant colors.',
                'price' => 12.50,
                'cost_price' => 5.00,
                'stock' => 500,
                'is_visible' => true,
                'is_featured' => false,
            ],
            // Premium Notebooks
            [
                'category_slug' => 'premium-notebooks',
                'name' => 'Leather Bound Journal',
                'slug' => 'leather-bound-journal',
                'sku' => 'NB-001',
                'description' => 'Handcrafted genuine leather journal with 100gsm cream paper.',
                'price' => 35.00,
                'cost_price' => 15.00,
                'stock' => 50,
                'is_visible' => true,
                'is_featured' => true,
            ],
            // Desk Accessories
            [
                'category_slug' => 'desk-accessories',
                'name' => 'Minimalist Desk Organizer',
                'slug' => 'minimalist-desk-organizer',
                'sku' => 'DA-001',
                'description' => 'Keep your workspace tidy with this wooden desk organizer.',
                'price' => 28.00,
                'cost_price' => 12.00,
                'stock' => 30,
                'is_visible' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $productData) {
            $categorySlug = $productData['category_slug'];
            unset($productData['category_slug']);

            $category = $categories->firstWhere('slug', $categorySlug);

            if ($category) {
                \App\Models\Product::create(array_merge($productData, [
                    'category_id' => $category->id,
                    'images' => null, // Placeholder
                ]));
            }
        }
    }
}
