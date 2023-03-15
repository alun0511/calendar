<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateEventTest extends TestCase
{

    use RefreshDatabase;

    public function test_create_task()
    {
        $user = new User();
        $user->name = 'Tester';
        $user->email = 'tester@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $this
            ->actingAs($user)
            ->post('events', [
                'title' => 'Finish this test.',
                'start_date' => '2023-04-20 00:00:00',
                'end_date' => '2023-04-21 00:00:00',
                'location' => 2,
            ]);

        $this->assertDatabaseHas('events', ['title' => 'Finish this test.']);
    }
}
