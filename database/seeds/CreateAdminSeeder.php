<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@admin',
                'password'=> bcrypt('12345678'),
                'is_admin'=>'1',
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
