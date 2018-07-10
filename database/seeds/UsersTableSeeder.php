<?php

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
        DB::table('users')->delete();

        $time = date("Y-m-d H:i:s");

		$users = array(
			array('user_group_ID' => '1', 'email' => 'sahoo.kumar.arun@gmail.com', 'phone' => '9853412445', 'uname' => 'EWHAdmin', 'password' => md5('password'), 'fname' => 'Arun Kumar', 'lname' => 'Sahoo', 'address' => '280, Nayapalli', 'city' => 'Bhubaneswar', 'state' => 'Odisha', 'country' => '100', 'zipcode' => '751012', 'status' => '1', 'created_at' => $time, 'updated_at' => $time),
		);
		DB::table('users')->insert($users);
    }
}
