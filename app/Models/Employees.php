<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'gender',
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'employee_id');
    }

    public static function getListByQuery() {
        return DB::select('SELECT e.id, p.name, CONCAT(e.first_name, " " ,e.last_name) as "fullname", t.status AS "status"
                                    FROM employees e, projects p, task t, records ea
                                    WHERE e.id = p.employee_id AND ea.employee_id = e.id AND ea.id = t.record_id
                                    ORDER BY e.id
                                    limit 10 offset 10;');
    }

    public static function getById($id) {
        return DB::select('SELECT e.id, CONCAT(e.first_name, " ", e.last_name) as "fullname", j.job_role
                                    FROM employees e, task t, job j, records r
                                    WHERE e.id = :id
                                    AND e.id = r.employee_id
                                    AND r.id = t.record_id
                                    AND j.id = t.job_id;', ['id' => $id]);
    }

    public static function getProjectByEmployeeId($id) {
        return DB::select('SELECT p.id, p.name, t.task_description as "desc", (r.standard_hours-r.spent_time) as "remaining_time"
                                FROM projects p, employees e, task t, records r
                                WHERE e.id = p.employee_id
                                AND e.id = r.employee_id
                                AND r.id = t.record_id
                                ORDER BY p.id
                                limit 4 offset 4;');
    }

    public static function search($search_text=null, $status=null, $projects=null) {
        $query = 'SELECT e.id, p.name, CONCAT(e.first_name, " ", e.last_name) as "fullname", t.status as "status"
                FROM employees e, projects p, task t, records r
                WHERE e.id = p.employee_id AND r.employee_id = e.id AND r.id = t.record_id';
        if ($search_text) {
            $query = $query.' AND p.name LIKE "'.$search_text.'" ';
        }
        if ($status) {
            $query = $query.' AND t.status = "'.$status.'" ';
        }
        $query = $query.' ORDER BY e.id limit 10';
        return DB::select($query);
    }

    public static function getDevelopersCount() {
        return DB::select('SELECT COUNT(e.id) as "devCount"
                                FROM employees e, records r, projects p
                                WHERE e.id = r.employee_id
                                AND  p.employee_id = e.id
                                AND r.spent_time = 0');
    }

    public static function getRemainigTime() {
        return DB::select('SELECT r.employee_id,  p.name, t.task_description as "desc", CONCAT(e.first_name, " ", e.last_name) as "fullname", (r.standard_hours-r.spent_time) as "remaining_time"
                                    FROM records r, projects p, employees e, task t
                                    WHERE e.id = r.employee_id
                                    AND e.id = p.employee_id
                                    AND r.id = t.record_id
                                    ORDER BY e.id
                                    limit 10 offset 10;');
    }

    public static function getSomesthing() {
//        SELECT e.employeeID, CONCAT(e.firstName,' ',e.lasName) as "fullname", er.spentTime, t.taskDescription
//FROM employee e, employee_record er,task t
//WHERE e.employeeID = er.employeeID AND er.employeeRecordID = t.employeeRecordID;
    }
    public static function createEmployee($name) {
        $arr = explode(' ', $name);
        return DB::insert('insert into employees (first_name, last_name) values (?, ?)', [$arr[0], count($arr) > 1 ? $arr[1] : '']);
    }
}
