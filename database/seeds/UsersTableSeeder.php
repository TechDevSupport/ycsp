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
        DB::table('users')->insert([
            'name'      => 'Ramesh Kumar',
            'email'     => 'ramesh@clerisysolutions.com',
            'password'  => Hash::make('123456'),
            'gender'    => 'male',
            'dob'       => '1985-10-28',
            'status'    => '1',
            'created_at'=> '2017-02-10 08:21:18',
            'updated_at'=> '2017-02-10 08:21:18',
        ]);
    }
}
