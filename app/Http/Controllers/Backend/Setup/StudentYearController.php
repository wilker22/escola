<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function viewYear()
    {
        $data =  StudentYear::all();

        return view('backend.setup.student_year.view_year', compact('data'));
    }

    public function studentYearAdd()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function studentYearStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);

        $data = new Studentyear();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Ano cadastrado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notificantion);
    }

    
    public function studentYearEdit($id)
    {
        $year = StudentYear::findOrFail($id);

        return view('backend.setup.student_year.edit_year', compact('year'));
    }
    

    public function studentYearUpdate(Request $request, $id)
    {
        $data = StudentYear::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Ano atualizado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notificantion);
    }

    public function studentYearDelete($id)
    {
        $year = StudentYear::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Ano removido com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notificantion);

    }   
}
