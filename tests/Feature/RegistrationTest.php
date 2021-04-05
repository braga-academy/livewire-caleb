<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function registration_page_contains_livewire_component()
    {
        $this->get('/register')->assertSeeLivewire('auth.register');
    }

    /** @test */
    function can_register()
    {
        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', 'test@test.com')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::whereEmail('test@test.com')->exists());
        $this->assertEquals('test@test.com', auth()->user()->email);
    }

    /** @test */
    function email_is_required()
    {
        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', '')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' =>'required']);
    }

    /** @test */
    function email_is_valid_email()
    {
        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', 'test')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' =>'email']);
    }

    /** @test */
    function email_hasnt_been_taken_already()
    {
        User::create([
            'name' => 'Frodo',
            'email' => 'test@test.com',
            'password' => Hash::make('secret')
        ]);

        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', 'test@test.com')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' =>'unique']);
    }

    /** @test */
    function see_email_hasnt_already_been_taken_validation_message_as_user_types()
    {
        User::create([
            'name' => 'Frodo',
            'email' => 'test@test.com',
            'password' => Hash::make('secret')
        ]);

        Livewire::test('auth.register')
            ->set('email', 'test@testi.com')
            ->assertHasNoErrors()
            ->set('email', 'test@test.com')
            ->assertHasErrors(['email' =>'unique']);
    }

    /** @test */
    function password_is_required()
    {
        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', 'test@test.com')
            ->set('password', '')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' =>'required']);
    }

    /** @test */
    function password_is_minimum_of_six_characters()
    {
        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', 'test@test.com')
            ->set('password', 'abc')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' =>'min']);
    }

    /** @test */
    function password_matches_password_confirmation()
    {
        Livewire::test('auth.register')
            ->set('name', 'Frodo')
            ->set('email', 'test@test.com')
            ->set('password', 'abc')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' =>'same']);
    }
}
