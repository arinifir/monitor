<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => Str::random(32),
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => 'admin',
        ]);

        Kelas::create([
            'id' => Str::random(32),
            'nama' => 'X MIPA 1'
        ]);
        Kelas::create([
            'id' => Str::random(32),
            'nama' => 'X MIPA 2'
        ]);
    }
}
