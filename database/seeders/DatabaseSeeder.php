<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
      $this->call([
        CategorySeeder::class,
    ]);

    // factory()->create() YERİNE firstOrCreate kullanıyoruz:
    // Bu sayede test@example.com varsa tekrar eklemeye çalışmaz, hatayı önler.
    User::firstOrCreate(
        ['email' => 'test@example.com'],
        [
            'name' => 'Test User',
            'password' => bcrypt('password'),
        ]
    );
    }
}