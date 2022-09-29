<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountEmployeeSalary;
use Illuminate\Http\Request;

class AccountSalaryController extends Controller
{
    public function AccountSalaryView()
    {
        $data['allData'] = AccountEmployeeSalary::all();
        return view('backend.account.employee_salary.employee_salary_view', $data);
    }
}
