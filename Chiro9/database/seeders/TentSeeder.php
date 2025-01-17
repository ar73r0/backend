<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tent;

class TentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tents = [
            [
                'name' => 'Luxury Tent',
                'description' => 'A spacious and luxurious tent with modern amenities.',
                'capacity' => 6,
                'price' => 150.00,
                'image' => null, // Replace with an image path if available
            ],
            [
                'name' => 'Family Tent',
                'description' => 'Perfect for families, this tent accommodates up to 8 people.',
                'capacity' => 8,
                'price' => 120.00,
                'image' => null,
            ],
            [
                'name' => 'Compact Tent',
                'description' => 'A small and lightweight tent ideal for solo adventurers.',
                'capacity' => 2,
                'price' => 50.00,
                'image' => null,
            ],
            [
                'name' => 'Party Tent',
                'description' => 'A large tent designed for hosting events and parties.',
                'capacity' => 20,
                'price' => 300.00,
                'image' => null,
            ],
            [
                'name' => 'Glamping Tent',
                'description' => 'Combines camping with luxury for a comfortable outdoor experience.',
                'capacity' => 4,
                'price' => 200.00,
                'image' => null,
            ],
        ];

        foreach ($tents as $tent) {
            Tent::create($tent);
        }
    }
}