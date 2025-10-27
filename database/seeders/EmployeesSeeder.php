<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        $companies = Company::all();
         foreach ($companies as $key => $company){
            foreach($company->departments as $department){
                foreach ($department->designations as $key => $designation){
                    for($i = 0; $i < 3; $i++){
                        Employee::create([
                            'designation_id' => $designation->id,
                            'name' => $faker->name,
                            'email' => $faker->unique()->safeEmail,
                            'phone' => $faker->phoneNumber,
                            'address' => $faker->address,
                        ]);
                    }
                }
            }
         }
    }
}
