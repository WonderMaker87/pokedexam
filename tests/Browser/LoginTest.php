<?php

// use App\Models\User;
// use Illuminate\Foundation\Testing\DatabaseTruncation;

// use Laravel\Dusk\Browser;

// uses(DatabaseTruncation::class);

// test('login', function () {
//     $user = User::factory()->create([
//         'email' => 'test@example.com',
//     ]);

//     $this->browse(function (Browser $browser) use ($user) {
//         $browser->visit('/login')
//             ->type('email', $user->email)
//             ->type('password', 'password')
//             ->press('LOG IN')
//             ->assertPathIs('/dashboard');
//     });
// });