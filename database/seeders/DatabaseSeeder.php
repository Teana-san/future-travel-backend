<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Создаем Админа
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@mail.com'], // условие поиска
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('12345'),
                'role' => 'admin',
            ]
        );

        // 2. Создаем обычного Юзера
        \App\Models\User::updateOrCreate(
            ['email' => 'mail@mail.com'],
            [
                'name' => 'Viajero',
                'surname' => 'Libre',
                'phone' => '+34 123 456 789',
                'password' => \Illuminate\Support\Facades\Hash::make('1234'),
                'role' => 'user',
            ]
        );


        // 3. Запускаем сидер туров (твои туры и даты)
        $this->call([
            TourSeeder::class,
        ]);
    }
}
