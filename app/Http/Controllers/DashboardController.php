<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $devsCount = Employees::getDevelopersCount();
        $projects = Employees::getRemainigTime();;
        return view('dashboard.index', ['devCount'=>$devsCount, 'projects'=>$projects]);
    }
}
