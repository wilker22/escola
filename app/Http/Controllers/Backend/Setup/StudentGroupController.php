<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function viewGroup()
    {
        $data =  StudentGroup::all();

        return view('backend.setup.student_group.view_group', compact('data'));
    }

    public function studentGroupAdd()
    {
        return view('backend.setup.student_group.add_group');
    }

    public function studentGroupStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Área cadastrada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.group.view')->with($notificantion);
    }

    
    public function studentGroupEdit($id)
    {
        $group = StudentGroup::findOrFail($id);

        return view('backend.setup.student_group.edit_group', compact('group'));
    }
    

    public function studentGroupUpdate(Request $request, $id)
    {
        $data = StudentGroup::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Área atualizada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.group.view')->with($notificantion);
    }

    public function studentGroupDelete($id)
    {
        $group = StudentGroup::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Área removida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.group.view')->with($notificantion);

    }   
}
