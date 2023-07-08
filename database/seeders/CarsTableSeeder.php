<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'plate_number' => 'B 1234 CD',
            'rental_rate' => 200000,
            'available' => true,
        ]);

        Car::create([
            'brand' => 'Honda',
            'model' => 'Jazz',
            'plate_number' => 'B 5678 EF',
            'rental_rate' => 250000,
            'available' => true,
        ]);

        Car::create([
            'brand' => 'Suzuki',
            'model' => 'Ertiga',
            'plate_number' => 'B 9102 GH',
            'rental_rate' => 300000,
            'available' => false,
        ]);
    }
}
