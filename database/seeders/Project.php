<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Project extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_pointer = base_path('resources/dataset/project.csv');
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
            if(!$row[2] && !is_int($row[2])) {
                continue;
            }
            DB::table('projects')->insert(
                array(
                    'id' => $row[0],
                    'employee_id' => $row[1],
                    'manager_id' => $row[2],
                    'name' => $row[3],
                )
            );
        }
    }
}
