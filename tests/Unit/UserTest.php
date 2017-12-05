<?php

namespace Tests\Unit;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanSeeUserPage(){

        $user = factory(User::class)->create();
        $reponse =$this->get('http://localhost:8000/profile/'.$user->username);

        $reponse->assertSee($user->name);

    }
}
