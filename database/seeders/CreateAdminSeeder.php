<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Vithushan',
            'email' => 'vithu@gmail.com',
            'gender' => 'm',
            'address' => 'Vavuniya',
            'mobile_no' => 772500500,
            'role' => 'admin',
            'password' => Hash::make('vithu900')
        ]);
    }
}
