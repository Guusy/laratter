<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
       // $this->assertTrue(true);
    	$response = $this->get('/');

    	$response->assertStatus(200);
    	$response->assertSee("Laratter");
    }

    public function testCanSearchForMessages(){
    	$response = $this->get('/messages?query=fannie');

    	$response->assertStatus(302);
    }
}
