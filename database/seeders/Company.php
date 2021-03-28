<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Company extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_pointer = base_path('resources/dataset/company.csv');
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
            DB::table('companies')->insert(
                array(
                    'employee_id' => $row[1],
                    'name' => $row[2],
                    'employee_number' => $row[3],
                )
            );
        }
    }
}
