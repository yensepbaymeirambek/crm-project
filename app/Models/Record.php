<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    use HasFactory;
    public static function createRecord($obj, $id) {
        $date   = new DateTime(); //this returns the current date time
        return DB::insert('insert into records (employee_id, performance_rating, spent_time, standard_hours, total_working_years, in_time, out_time) values (?, ?, ?, ?, ?, ?, ?)',
            [$id, 3, '00:00:00', 8, 0, $date->format('Y-m-d-H-i-s'),$date->format('Y-m-d-H-i-s')]);
    }

}
