<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Task extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_pointer = base_path('resources/dataset/task.csv');
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
            DB::table('task')->insert(
                array(
                    'id' => $row[0],
                    'job_id' => $row[1],
                    'record_id' => $row[2] === '' ? null : $row[2],
                    'task_description' => $row[3],
                    'status' => $row[4] === 'in process' ? 'in_process' : $row[4],
                    'activity' => $row[5],
                    'total_time' => $row[6],
                    'alarm' => $row[7],
                )
            );
        }
    }
}
