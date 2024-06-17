<?php

namespace Database\Seeders;

use App\Models\Attack;
use Illuminate\Database\Seeder;

class AttackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attack::factory()->create([
            'name' => "Vague Écrasante",
            'damage' =>'10',
            'description' => "Une vague massive qui s'écrase avec une force dévastatrice, submergeant tout sur son passage.",
            'img_path' => 'images\Vagueecrasante.webp',
            'type_id' => '1'
        ]);
        Attack::factory()->create([
            'name' => "Vortex d'Eau",
            'damage' =>'16',
            'description' => "Un puissant tourbillon d'eau qui aspire tout sur son passage, créant un véritable cyclone aquatique.",
            'img_path' => 'images\Vortexeau.webp',
            'type_id' => '1'
        ]);
        Attack::factory()->create([
            'name' => "Mur de Fer",
            'damage' =>'7',
            'description' => "Une muraille de fer se dresse puissamment depuis le sol, offrant une protection inégalée et infligeant des dégâts à quiconque tente de la franchir.",
            'img_path' => 'images\Murdefer.webp',
            'type_id' => '2'
        ]);
        Attack::factory()->create([
            'name' => "Tourbillon d'Acier",
            'damage' =>'14',
            'description' => "Un puissant tourbillon de métal qui emporte tout sur son passage avec une force incroyable.",
            'img_path' => 'images\Tourbillonacier.webp',
            'type_id' => '2'
        ]);
        Attack::factory()->create([
            'name' => "Thunder Fist",
            'damage' =>'16',
            'description' => "Un coup de poing foudroyant entouré d'étincelles électriques, frappant avec une force et une vitesse incroyables.",
            'img_path' => 'images\Thunderfist.webp',
            'type_id' => '3'
        ]);
        Attack::factory()->create([
            'name' => "Meteor Slam",
            'damage' =>'20',
            'description' => "Un saut puissant suivi d'un écrasement au sol avec une force immense, créant une onde de choc destructrice.",
            'img_path' => 'images\Meteorslam.webp',
            'type_id' => '3'
        ]);
        Attack::factory()->create([
            'name' => "Rugissement du dragon",
            'damage' =>'18',
            'description' => "Un rugissement puissant qui envoie des ondes de choc et des flammes sur le champ de bataille.",
            'img_path' => 'images\Rugissementdudragon.webp',
            'type_id' => '4'
        ]);
        Attack::factory()->create([
            'name' => "Fureur draconqiue",
            'damage' =>'22',
            'description' => "Un assaut furieux où le Pokémon dragon, enveloppé de flammes, charge en avant avec une puissance destructrice.",
            'img_path' => 'images\Fureurdraconique.webp',
            'type_id' => '4'
        ]);
        Attack::factory()->create([
            'name' => "Frappe Tonnerre",
            'damage' =>'19',
            'description' => "Un immense éclair est invoqué du ciel, frappant le sol avec une force incroyable.",
            'img_path' => 'images\Frappetonnerre.webp',
            'type_id' => '5'
        ]);
        Attack::factory()->create([
            'name' => "Explosion Électrique",
            'damage' =>'21',
            'description' => "Une explosion d'énergie électrique est libérée dans toutes les directions, avec des arcs électriques et des étincelles.",
            'img_path' => 'images\Explosionelectrique.webp',
            'type_id' => '5'
        ]);
        Attack::factory()->create([
            'name' => 'Inferno Ardent',
            'damage' =>'22',
            'description' => "Une vague massive de flammes déchaînées, engloutissant tout sur son passage avec une chaleur intense.",
            'img_path' => 'images\Infernoardent.webp',
            'type_id' => '6'
        ]);
        Attack::factory()->create([
            'name' => 'Explosion de Flammes',
            'damage' =>'20',
            'description' => "Une explosion concentrée de feu, créant une déflagration à l'impact, laissant des braises et de la fumée sur le champ de bataille.",
            'img_path' => 'images\Explosiondeflammes.webp',
            'type_id' => '6'
        ]);
    }
}