<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;
    public static function createJob($obj) {
        return DB::insert('insert into job (job_level, job_role) values (?, ?)', [1, $obj->job]);
    }
}
