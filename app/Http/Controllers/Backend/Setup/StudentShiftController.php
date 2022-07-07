<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function viewShift()
    {
        $data =  StudentShift::all();

        return view('backend.setup.student_shift.view_shift', compact('data'));
    }

    public function studentShiftAdd()
    {
        return view('backend.setup.student_shift.add_shift');
    }

    public function studentShiftStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Turno cadastrada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.shift.view')->with($notificantion);
    }

    
    public function studentShiftEdit($id)
    {
        $shift = StudentShift::findOrFail($id);

        return view('backend.setup.student_shift.edit_shift', compact('shift'));
    }
    

    public function studentShiftUpdate(Request $request, $id)
    {
        $data = StudentShift::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Turno atualizada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.shift.view')->with($notificantion);
    }

    public function studentShiftDelete($id)
    {
        $shift = StudentShift::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Turno removida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.shift.view')->with($notificantion);

    }   
}
