<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function marksGradeView()
    {
        $data['allData'] = MarksGrade::all();
        return view('backend.marks.grade_marks_view', $data);
    }

    public function marksGradeAdd()
    {
        return view('backend.marks.grade_marks_add');
    }

    public function marksGradeStore(Request $request)
    {
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;

        $data->save();

        $notification = [
            'message' => 'Grade cadastrada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('marks.entry.grade')->with($notification);
    }

    public function MarksGradeEdit($id){
    	$data['editData'] = MarksGrade::find($id);
    	return view('backend.marks.grade_marks_edit',$data);

    }

    public function MarksGradeUpdate(Request $request, $id){

    	$data = MarksGrade::find($id);
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Notas atualizada com sucesso!',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.entry.grade')->with($notification);

    }

}
