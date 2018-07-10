<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers;
use Session;

class UserTest extends TestCase
{
    /**
     * A user login test.
     *
     * @return void
     */
    public function testLoginPost(){
	    Session::start();
	    $response = $this->call('POST', '/login', [
	        'email' => 'sahoo.kumar.arun@gmail.com',
	        'password' => 'password',
	        '_token' => csrf_token()
	    ]);
	    $this->assertEquals(200, $response->getStatusCode());
	    $this->assertEquals('auth.login', $response->original->name());
	}
}
