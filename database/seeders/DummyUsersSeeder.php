<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Asep',
                'email' => 'asep@gmail.com',
            'role' => 'admin',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'nopal',
                'email' => 'nopal@gmail.com',
                'role' => 'user',
                'password' => bcrypt('12345')
            ],
        ];

        foreach ($data as $d =>$val) {
            User::create($val);
        }
    }
}
