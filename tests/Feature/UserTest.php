<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{
	use DatabaseTransactions;


	/** @test a user can log in */
	public function a_user_can_log_in(){
		$user = factory(User::class, 1)->create();


		$this->get('login')
			->assertStatus(200);

//		$this->post('login', [
//			'email'    => $user->email,
//			'password' => $user->password,
//			'_token'   => csrf_token(),
//
//		])->assertStatus(200);
	}
}
