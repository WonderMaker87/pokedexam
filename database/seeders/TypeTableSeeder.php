<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory()->create([
            'name' => 'Eau',
            'img_path' => 'storage\images\Eau.png',
            'color' =>'#2980EF'
        ]);
        Type::factory()->create([
            'name' => 'Acier',
            'img_path' => 'storage\images\Acier.png',
            'color' =>'#60A1B8'
        ]);
        Type::factory()->create([
            'name' => 'Combat',
            'img_path' => 'storage\images\Combat.png',
            'color' =>'#FF8000'
        ]);
        Type::factory()->create([
            'name' => 'Dragon',
            'img_path' => 'storage\images\Dragon.png',
            'color' =>'#5060E1'
        ]);
        Type::factory()->create([
            'name' => 'Electrique',
            'img_path' => 'storage\images\Electrique.png',
            'color' =>'#FAC000'
        ]);
        Type::factory()->create([
            'name' => 'Feu',
            'img_path' => 'storage\images\Feu.png',
            'color' =>'#E62829'
        ]);
    }
}