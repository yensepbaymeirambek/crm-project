<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    public static function createProject($obj, $id) {
        return DB::insert('insert into projects (employee_id, name) values (?, ?)', [$id, $obj->job]);
    }
}
