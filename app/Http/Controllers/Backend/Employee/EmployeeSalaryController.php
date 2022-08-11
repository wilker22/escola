<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeSalaryController extends Controller
{
    public function salaryView(){
        $data['allData'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function salaryIncrement($id)
    {
        $data['editData'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment', $data);
    }
    
}
