<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'address' => 'Jalan Merdeka No. 123',
            'phone_number' => '081234567890',
            'sim_number' => '12345678901',
            'email' => 'john@example.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'address' => 'Jalan Sudirman No. 456',
            'phone_number' => '087654321098',
            'sim_number' => '98765432109',
            'email' => 'james@example.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
