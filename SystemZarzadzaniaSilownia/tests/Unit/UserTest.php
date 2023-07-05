<?php

namespace Tests\Unit;

use Tests\TestCase;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Janusz'
        ]);
    }

    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
