<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@email.com',
            'phone' => 8012345678,
            'password' => Hash::make('malik005'),
        ]);

        Author::create([
            'firstname' => 'Sarah',
            'lastname' => 'Doe',
            'email' => 'sarah@email.com',
            'phone' => 8087654321,
            'password' => Hash::make('malik005'),
        ]);
    }
}
