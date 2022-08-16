<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function leaveView()
    {
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc')->get();
        return view('backend.employee.employee_leave.employee_leave_view', $data);
    }

    public function leaveAdd()
    {
        $data['employees'] = User::where('usertype', 'employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_add', $data);
       
    }

    public function leaveStore(Request  $request)
    {
        if($request->leave_purpose_id == "0"){
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();

            $leave_purpose_id = $leavepurpose->id;

        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = [
            'message' => "Licensa inserida com sucesso!",
            'alert-type' => 'success'
        ];

        return redirect()->route('employee.leave.view')->with($notification);

    }

    public function leaveEdit($id)
    {
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype', 'employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();

        return view('backend.employee.employee_leave.employee_leave_edit', $data);
    }

    public function leaveUpdate(Request $request, $id)
    {
        if($request->leave_purpose_id == "0"){
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();

            $leave_purpose_id = $leavepurpose->id;

        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = EmployeeLeave::find($id);
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = [
            'message' => "Licensa Atualizada com sucesso!",
            'alert-type' => 'success'
        ];

        return redirect()->route('employee.leave.view')->with($notification);
    }

    public function leaveDelete($id)
    {
        $leave = EmployeeLeave::find($id);
        $leave->delete();

        $notification = [
            'message' => "Licensa Removida com sucesso!",
            'alert-type' => 'success'
        ];

        return redirect()->route('employee.leave.view')->with($notification);


    }


}
