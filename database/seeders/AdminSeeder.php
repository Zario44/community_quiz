<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // On crée l'utilisateur Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@monquiz.com',
            'password' => Hash::make('1234'), // Toujours hasher le mdp !
            'is_admin' => true, // On le met admin direct
        ]);
        
        // On peut même afficher un message dans la console
        $this->command->info('Compte Admin créé !');
    }
}
