<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('email');
        $response->assertStatus(200);
    }
    public function test_login_user()
    {
        $user = new User();
        $user->name = 'Tester';
        $user->email = 'test@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'test@yrgo.se',
                'password' => '123',
            ]);

        $response->assertSeeText('Your events:');
    }
    public function test_login_user_without_password()
    {
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
            ]);

        $response->assertSeeText('An error accured during login attempt, please try again.');
    }
}
