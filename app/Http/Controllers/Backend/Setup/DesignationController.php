<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function viewDesignation()
    {
        $data =  Designation::all();

        return view('backend.setup.designation.view_designation', compact('data'));
    }

    public function designationAdd()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function designationStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Função cadastrada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('designation.view')->with($notificantion);
    }

    
    public function designationEdit($id)
    {
        $designation = Designation::findOrFail($id);

        return view('backend.setup.designation.edit_designation', compact('designation'));
    }
    

    public function designationUpdate(Request $request, $id)
    {
        $data = Designation::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Função atualizada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('designation.view')->with($notificantion);
    }

    public function designationDelete($id)
    {
        $year = Designation::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Função removida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('designation.view')->with($notificantion);

    }   
}
