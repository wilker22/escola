<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function viewExamType()
    {
        $data =  ExamType::all();

        return view('backend.setup.exam_type.view_exam_type', compact('data'));
    }

    public function examTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function examTypeStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name'
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Dados cadastrado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('exam.type.view')->with($notificantion);
    }

    
    public function examTypeEdit($id)
    {
        $exam = examType::findOrFail($id);

        return view('backend.setup.exam_type.edit_exam_type', compact('exam'));
    }
    

    public function examTypeUpdate(Request $request, $id)
    {
        $data = ExamType::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Dados atualizados com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('exam.type.view')->with($notificantion);
    }

    public function examTypeDelete($id)
    {
        $exam = ExamType::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Dado removido com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('exam.type.view')->with($notificantion);

    }   
}
