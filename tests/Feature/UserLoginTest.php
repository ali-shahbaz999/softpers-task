<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response1 = $this->get('/login');

        $response1->assertStatus(200);

        $user = [
            'name' => 'Ali',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];

       $this->post('/register', $user);

        $this->post('login',[
            'email' =>'testemail@test.com',
            'password' => 'password'
        ]);

        $this->assertAuthenticated();
    }
}
