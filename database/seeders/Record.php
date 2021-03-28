<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Record extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_pointer = base_path('resources/dataset/employee_record.csv');
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
            DB::table('records')->insert(
                array(
                    'id' => $row[0],
                    'employee_id' => $row[1],
                    'performance_rating' => $row[2] === '' ? null : $row[2],
                    'spent_time' => $row[3],
                    'standard_hours' => $row[4] === '' ? null : $row[4],
                    'total_working_years' => $row[5] === 'NA' || $row[5] === '' ? null : $row[5],
                    'in_time' => $row[6] === 'NA' || $row[6] === ''? null : $row[6],
                    'out_time' => $row[7] === 'NA' || $row[7] === ''? null : $row[7],
                )
            );
        }
    }
}
