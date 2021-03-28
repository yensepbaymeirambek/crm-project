<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeAdditionalInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_pointer = base_path('resources/dataset/employee_additional_info.csv');
        $dataset = fopen($file_pointer, 'r');
        $iter = 0;
        while (($row = fgetcsv($dataset, 10000, ',')) != false){
            if($iter === 0) {
                $iter = +1;
                continue;
            }
            if(!$row[0] && !is_int($row[0])) {
                continue;
            }
            if(!$row[1] && !is_int($row[1])) {
                continue;
            }
            DB::table('employee_additional_info')->insert(
                array(
                    'id' => $row[0],
                    'employee_id' => $row[1],
                    'education' => $row[2] === '' ? null : $row[2],
                    'marial_status' => $row[3],
                    'monthly_income' => $row[4] === '' ? null : $row[4],
                    'environment_satisfaction' => $row[5] === 'NA' || $row[5] === '' ? null : $row[5],
                    'training_times_last_year' => $row[6] === 'NA' || $row[6] === ''? null : $row[6],
                    )
            );
        }
    }
}
