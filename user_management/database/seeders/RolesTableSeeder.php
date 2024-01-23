<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Désactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Tronquer la table users
        User::truncate();

        // Tronquer la table roles
        Role::truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Créer de nouveaux rôles
        Role::create(['name' => 'administrateur']);
        Role::create(['name' => 'enseignant']);
        Role::create(['name' => 'élève']);
    }
}
