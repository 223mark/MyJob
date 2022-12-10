<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ListOfJobs;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Model\User::factory(3)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '00067788',
            'address' => 'Yangon',
            'role' => 'admin',
            'password' => Hash::make('123456789'),
        ]);
        User::create([
            'name' => 'AceTech Solution Companyltd',
            'email' => 'employer@gmail.com',
            'phone' => '78667788',
            'address' => 'Yangon',
            'role' => 'employer',
            'password' => Hash::make('123456789'),
        ]);
        User::create([
            'name' => 'KyawKyaw',
            'email' => 'user@gmail.com',
            'phone' => '09667788',
            'address' => 'Yangon',
            'role' => 'user',
            'password' => Hash::make('123456789'),
        ]);
        // ListOfJobs::create([
        //     'job_title' => 'Backend Developer',
        //     'company_name' => 'AceTech Solution Companyltd',
        //     'salary' => '400000-500000',
        //     'tags' => 'laravel, vue, api',
        //     'location' => 'Sanchaung,Yangon,Myanmar',
        //     'description' => 'remote',
        //     'email' => 'employer@gmail.com',
        //     'website' => 'Codelab.com',
        // ]);
    }
}
