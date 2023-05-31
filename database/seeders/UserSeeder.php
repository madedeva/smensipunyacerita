<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@smensi.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Guru',
            'email' => 'guru@smensi.sch.id',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@smensi.sch.id',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);
    }
}
