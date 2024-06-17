<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonTableSeeder extends Seeder
{
    public function run(): void
    {
        Pokemon::factory()->create([
            "name" => "Aquasteel",
            "hp" => "95",
            "weight" => "120",
            "height" => "1.7",
            "img_path" => "images\Aquasteel.webp",
            "primary_type_id" =>"1",
            "secondary_type_id" =>"2"
        ]);
        Pokemon::factory()->create([
            "name" => "Scorpine",
            "hp" => "120",
            "weight" => "160",
            "height" => "1.3",
            "img_path" => "images\Scorpine.webp",
            "primary_type_id" =>"3"
        ]);
        Pokemon::factory()->create([
            "name" => "Voltaze",
            "hp" => "95",
            "weight" => "80",
            "height" => "1.0",
            "img_path" => "images\Voltaze.webp",
            "primary_type_id" =>"5"
        ]);
        Pokemon::factory()->create([
            "name" => "Dracorash",
            "hp" => "220",
            "weight" => "320",
            "height" => "3.0",
            "img_path" => "images\Dracorash.webp",
            "primary_type_id" =>"4",
            "secondary_type_id" =>"6"
        ]);
        Pokemon::factory()->create([
            "name" => "Salameat",
            "hp" => "80",
            "weight" => "80",
            "height" => "0.7",
            "img_path" => "images\Salameat.webp",
            "primary_type_id" =>"3"
        ]);
    }
}