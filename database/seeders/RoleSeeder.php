<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Insert default roles into the roles table
        // Yeah, the fuggin admin role, let's gooooo....
        DB::table('roles')->insert([
            'id_role' => 1,
            'role' => 'Admin',
        ]);
    }
}
