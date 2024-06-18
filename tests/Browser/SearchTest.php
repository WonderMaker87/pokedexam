<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchTest extends DuskTestCase
{


    public function testSearchFunctionality()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->screenshot('Nofilter')
                    ->type('search', 'Aquasteel')
                    ->press('Rechercher')
                    ->screenshot('Filter')
                    ->assertSee('Aquasteel')
                    ->assertDontSee('Scorpine')
                    ->assertDontSee('Voltaze');
        });
    }
}
