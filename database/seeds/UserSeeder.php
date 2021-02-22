<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'first_name' => 'admin',
            'middle_name' => 'admin',
            'last_name' => 'admin',
            'contact' => '0000-000-00-00',
            'email' => 'admin@admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
