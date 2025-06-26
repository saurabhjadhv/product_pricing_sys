<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CustomPrice;
use Illuminate\Database\Seeder;

class CustomPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
    {
        $prices = [
            [
                'product_id' => 1,  
                'partner_id' => 1,  
                'custom_price_usd' => 599.99
            ],
            [
                'product_id' => 1, 
                'partner_id' => 3,
                'custom_price_usd' => 579.99
            ],
            [
                'product_id' => 2, 
                'partner_id' => 1,
                'custom_price_usd' => 199.99
            ],
            [
                'product_id' => 3,
                'partner_id' => 2, 
                'custom_price_usd' => 249.99
            ],
            [
                'product_id' => 4, 
                'partner_id' => 4, 
                'custom_price_usd' => 89.99
            ]
        ];

        foreach ($prices as $price) {
            CustomPrice::create($price);
        }
    }
}
