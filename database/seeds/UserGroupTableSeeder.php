<?php

use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->delete();

		$group = array(
			array('group' => 'Super Administrator'),
			array('group' => 'Administrator'),
			array('group' => 'Manager'),
			array('group' => 'Staff'),
			array('group' => 'Customer'),
		);
		DB::table('user_groups')->insert($group);
    }
}
