<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class MarksController extends Controller
{
    public function marksAdd()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_add', $data);
    }

    public function marksStore(Request $request)
    {
        $student_count = $request->student_id;

        if($student_count){
            for($i=0; $i < count($request->student_id); $i++){
                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();
            }

            
        }

        $notification = [
            'message' => 'Notas cadastradas com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function marksEdit()
    {   
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_edit', $data);
    }

    public function marksEditGetstudents(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $assign_subject_id = $request->assign_subject_id;
        $exam_type_id = $request->exam_type_id;

        $getStudent = StudentMarks::with(['student'])
                                  ->where('year_id', $year_id)
                                  ->where('class_id', $class_id)
                                  ->where('assign_subject_id', $assign_subject_id)
                                  ->where('exam_type_id', $exam_type_id)->get();
        
        return response()->json($getStudent);

    }

    public function marksUpdate(Request $request)
    {
        StudentMarks::with(['student'])
                    ->where('year_id', $year_id)
                    ->where('class_id', $class_id)
                    ->where('assign_subject_id', $assign_subject_id)
                    ->where('exam_type_id', $exam_type_id)
                    ->delete();

        $student_count = $request->student_id;

        if($student_count){
            for($i=0; $i < count($request->student_id); $i++){
                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();
            }
        
        }

    
        $notification = [
            'message' => 'Notas atualizadas com sucesso',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    
}
