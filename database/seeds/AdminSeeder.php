<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'Frank',
            'email' => 'frank@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('test123456'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        $admin->save();
    }
}
