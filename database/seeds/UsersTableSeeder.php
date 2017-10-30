<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\User::class)->create([
			'name'     => 'Ethan Brace',
			'password' => bcrypt('platahalcon13'),
			'email'    => 'ethanabrace@gmail.com'

		]);
    }
}
