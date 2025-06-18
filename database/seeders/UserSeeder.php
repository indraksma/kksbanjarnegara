<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'opd']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('Admin1324'),
        ]);
        $opd = User::create([
            'name' => 'Dinkominfo',
            'email' => 'dinkominfo@banjarnegarakab.go.id',
            'password' => Hash::make('DawetAyu@1324'),
        ]);

        $admin->assignRole('admin');
        $admin->assignRole('opd');
    }
}
