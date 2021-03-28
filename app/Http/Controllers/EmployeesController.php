<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Project;
use App\Models\Task;
use App\Models\Employees;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $result = Employees::search($request->text, $request->status, $request->project);
        return view('employees.index', ['result'=>$result]);
    }

    public function show($locale, $id)
    {
        $result = Employees::getById($id);
        $projects = Employees::getProjectByEmployeeId($id);
        return view('employees.show', ['result'=>$result, 'projects'=>$projects]);
    }

    public function store(Request $request) {
        Employees::createEmployee($request->employee);
        $id = DB::getPdo()->lastInsertId();
        Record::createRecord($request, $id);
        $record_id = DB::getPdo()->lastInsertId();
        Job::createJob($request);
        $job_id = DB::getPdo()->lastInsertId();
        Project::createProject($request, $id);
        if(Task::createTask($request, $record_id, $job_id)) {
            $result = Employees::getListByQuery();
            return view('employees.index', ['result'=>$result]);
        }
        else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
