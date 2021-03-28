<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            User::class,
            Manager::class,
            Project::class,
            Company::class,
            Employee::class,
            EmployeeAdditionalInfo::class,
            Job::class,
            Record::class,
            Task::class,
        ]);
    }
}
