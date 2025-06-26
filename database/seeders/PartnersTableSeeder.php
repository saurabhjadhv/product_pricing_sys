<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        $partners = [
            [
                'name' => 'Tech Distributors Inc.',
                'email' => 'sales@techdist.com',
                'contact_number' => '+1 (555) 123-4567'
            ],
            [
                'name' => 'Office Solutions Ltd.',
                'email' => 'info@officesol.com',
                'contact_number' => '+1 (555) 987-6543'
            ],
            [
                'name' => 'Global Electronics',
                'email' => 'contact@globalelec.com',
                'contact_number' => '+1 (555) 456-7890'
            ],
            [
                'name' => 'Home & Kitchen Supplies',
                'email' => 'support@hksupplies.com',
                'contact_number' => '+1 (555) 789-0123'
            ]
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
