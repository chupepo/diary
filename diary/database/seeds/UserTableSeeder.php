<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder {

	public function run()
	{
		$id =\DB::table('users')->insertGetId(array(
			'name' => 'Andrey',
			'lastname' => 'Alfaro',
			'avatar' => '',
			'email'  => 'andrey@gmail.com',
			'password' => \Hash::make('123456')
		));
	}

}