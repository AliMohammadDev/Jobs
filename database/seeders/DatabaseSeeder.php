<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    $user =  User::factory()->create([
      'name' => 'Ali',
      'email' => 'ali@gmail.com',
      'password' => Hash::make('password')
    ]);
    Employer::create([
      'user_id' => $user->id,
      'name' => 'Ali employee',
      'logo' => 'default-employer.jpg',
    ]);

    // $this->call(JobSeeder::class);
  }
}
