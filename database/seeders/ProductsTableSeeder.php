<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $products = [
            [
                'title' => 'Smartphone X',
                'description' => 'Latest smartphone with advanced camera',
                'category' => 'Electronics',
                'document' => null
            ],
            [
                'title' => 'Wireless Headphones',
                'description' => 'Noise-cancelling Bluetooth headphones',
                'category' => 'Electronics',
                'document' => null
            ],
            [
                'title' => 'Office Chair',
                'description' => 'Ergonomic office chair with lumbar support',
                'category' => 'Furniture',
                'document' => null
            ],
            [
                'title' => 'Coffee Maker',
                'description' => 'Automatic drip coffee machine',
                'category' => 'Appliances',
                'document' => null
            ],
            [
                'title' => 'Notebook',
                'description' => 'Premium quality A5 notebook',
                'category' => 'Stationery',
                'document' => null
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
