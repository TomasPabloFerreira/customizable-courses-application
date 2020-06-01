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
        DB::table('user')->insert([
            'name' => 'admin',
            'surname' => '',
            'email' => Str::random() . '@admin.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
    }
}
