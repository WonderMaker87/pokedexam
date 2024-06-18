<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Type;
use Illuminate\Http\UploadedFile;

class CreatePokemonTest extends DuskTestCase
{    
    public function testAuthenticatedFeature()
        {
            $this->browse(function (Browser $browser) {
                $user = User::find(1);
                $browser->loginAs($user)
                        ->visit('/admin/pokemons/create');
            });
        }
    
    public function testUserCanCreatePokemon()
    {
        $type1 = Type::where('name', 'Eau')->first();
        $type2 = Type::where('name', 'Combat')->first();

        $this->browse(function (Browser $browser) use ($type1, $type2) {
            $browser->screenshot('test')
                    ->type('name', 'Test')
                    ->type('hp', '35')
                    ->type('weight', '6.0')
                    ->type('height', '0.4')
                    ->attach('img_path', __DIR__.'/files/Test.webp')
                    ->select('primary_type_id', $type1->id)
                    ->select('secondary_type_id', $type2->id)
                    ->press('CRÉER')
                    ->assertPathIs('/admin/pokemons')
                    ->assertSee('Test');
        });
    }
}
