<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function viewStudent()
    {
        $data =  StudentClass::all();

        return view('backend.setup.student_class.view_class', compact('data'));
    }

    public function studentClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function studentClassStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Sala cadastrada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notificantion);
    }

    
    public function studentClassEdit($id)
    {
        $class = StudentClass::findOrFail($id);

        return view('backend.setup.student_class.edit_class', compact('class'));
    }
    

    public function studentClassUpdate(Request $request, $id)
    {
        $data = StudentClass::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Sala atualizada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notificantion);
    }

    public function studentClassDelete($id)
    {
        $class = StudentClass::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Sala removida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notificantion);

    }   
}
