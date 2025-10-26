<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'TechCorp Solutions',
                'email' => 'contact@techcorp.com',
                'website' => 'www.techcorp.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Global Innovations Inc',
                'email' => 'info@globalinnovations.com',
                'website' => 'www.globalinnovations.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Digital Systems Ltd',
                'email' => 'contact@digitalsystems.com',
                'website' => 'www.digitalsystems.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Future Tech Enterprise',
                'email' => 'info@futuretech.com',
                'website' => 'www.futuretech.com',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

         foreach (Company::all() as $company) {
            $company->users()->attach(1);
        }
    }
}
