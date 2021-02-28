<?php

use Illuminate\Database\Seeder;
use App\User;

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
        factory(User::class)->create([
            'name' => "Kevin Paz",
            'telefono'=>"593963282309",
            'caja'=>10,
            'user_rol_id' => 1,
            'email' => "pazortizkevindaniel@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("Loco2541003"), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
