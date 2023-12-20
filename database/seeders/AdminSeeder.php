<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Hr;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
     
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role'=>'admin',
            'password'=> Hash::make('password')
            
        ]);
       
    }
}
