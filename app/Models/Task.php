<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    public static function createTask($obj, $id, $job_id){
        return DB::insert('insert into task (record_id, job_id, task_description, status, activity, total_time, alarm) values (?, ?, ?, ?, ?, ?, ?)',
            [$id, $job_id, $obj->description, 'in_process', $obj->activity, $obj->total_time, $obj->alarm]);
    }
}
