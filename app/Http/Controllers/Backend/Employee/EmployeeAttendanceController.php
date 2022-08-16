<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function attendaceView()
    {
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();
        // $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC')->get();

        return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    public function attendaceAdd()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();

        return view('backend.employee.employee_attendance.employee_attendance_add', $data);
    }

    public function attendanceStore(Request $request)
    {
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
        $countemployee = count($request->employee_id);

        for($i=0; $i<$countemployee ; $i++){
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendance();
            $attend->date = date('Y/m/d', strtotime($request->date));
            $attend->empoyee_id = $request->empoyee_id[$i];
            $attend->attend_status = $request->attend_status;
            $attend->save();
        }

        $notification = [
            'message' => 'Registro de Comparecimento efetuado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('employee.ttendance.view')->with($notification);
    }

    public function attendanceEdit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();
        $data['employees'] = User::where('usertype', 'employee')->get();

        return view('backend.employee.employee_attendance.employee_attendace_edit', $data);
    }

    public function attendanceDetails($date)
    {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();

        return view('backend.employee.employee_attendance.employee_attendace_details', $data);
    }
}
