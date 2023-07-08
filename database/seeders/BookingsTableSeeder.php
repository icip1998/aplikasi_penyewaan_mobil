<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::create([
            'user_id' => 1,
            'car_id' => 1,
            'start_date' => '2023-07-01',
            'end_date' => '2023-07-03',
        ]);

        Booking::create([
            'user_id' => 2,
            'car_id' => 2,
            'start_date' => '2023-07-02',
            'end_date' => '2023-07-05',
        ]);
    }
}
