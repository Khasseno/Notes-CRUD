<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => null,
            'is_admin' => true,
        ]);
//        User::factory(3)->create();
//        Note::factory(150)->create();
    }
}
