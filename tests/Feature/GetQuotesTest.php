<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class GetQuotesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = [
            'name' => 'Ali',
            'email' => 'testemail@test.com',
            'password' => 'passwordtest',
            'password_confirmation' => 'passwordtest'
        ];
        $this->post('/register', $user);
        $this->post('login', [
            'email' => 'testemail@test.com',
            'password' => 'password'
        ]);
        $this->assertAuthenticated();
        $response =  $this->get('/api/quotes');

        $response->assertStatus(200);
    }
}
