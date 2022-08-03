<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollController extends Controller
{
    public function studentRollView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.roll_generate.roll_generate_view', $data);
    }

    public function getStudents()
    {
        $allData = AssignStudent::with(['student'])->where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        //dd($allData->toArray());
        return response()->json($allData);
    }

    public function studentsRollStore(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if($requests->student_id != null){
            for ($i=0; $i < count($request->student_id[$i]); $i++){
                AssignStudent::where('year_id', $year_id)
                             ->where('class_id', $class_id)
                             ->where('student_id', $request->student_id[$i])
                             ->update(['roll' => $request->roll[$i]]);
            }

        }else{
            $notification = [
                'message' => 'Não existem alunos para a pesquisa!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        $notification = [
            'message' => 'Lista gerada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('roll.generate.view')->with($notification);
    }
}
