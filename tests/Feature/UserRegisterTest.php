<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_example()
    {
        
        $response1 = $this->get('/register');

        $response1->assertStatus(200);

        $user = [
            'name' => 'Ali',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

        $response2 = $this->post('/register', $user);

        $response2->assertRedirect('/home');

        array_splice($user, 2, 2);

        $this->assertDatabaseHas('users', $user);
    }

    
}
