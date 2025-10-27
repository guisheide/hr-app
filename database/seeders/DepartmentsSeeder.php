<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = $company = Company::all();

        foreach ($company as $company) {
            $departments = $company->departments()->createMany([
                ['name' => 'Human Resources'],
                ['name' => 'Finance'],
                ['name' => 'IT'],
                ['name' => 'Marketing'],
                ['name' => 'Sales'],
            ]);

        foreach($departments as $department) {
            switch ($department->name){
                case 'Engineering':
                    $designations = [
                        'Software Engineer',
                        'Senior Software Engineer',
                        'Engineering Manager',
                        'Director of Engineering',
                    ];
                break;
                    case 'Human Resources':
                        $designations = [
                            'HR Assistant',
                            'HR Manager',
                            'HR Director',
                            'Talent Acquisition Specialist'
                        ];
                    break;
                    case 'Finance':
                        $designations = [
                            'Accountant',
                            'Financial Analyst',
                            'Finance Manager',
                            'Chief Financial Officer'
                        ];
                    break;
                    case 'IT':
                        $designations = [
                            'System Administrator',
                            'IT Support Specialist',
                            'IT Manager',
                            'Chief Technology Officer'
                        ];
                    break;
                    case 'Marketing':
                        $designations = [
                            'Marketing Coordinator',
                            'Marketing Manager',
                            'Digital Marketing Specialist',
                            'Chief Marketing Officer'
                        ];
                    break;
                    case 'Sales':
                        $designations = [
                            'Sales Representative',
                            'Sales Manager',
                            'Account Executive',
                            'Sales Director'
                        ];
                    break;
                default:
                        $designations = [];
                break;
            }

                foreach($designations as $designation){
                    $department->designations()->create([
                        'name' => $designation,
                    ]);
                }
            }
        }
    }
}

