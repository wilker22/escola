<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function viewFeeCat()
    {
        $cat =  FeeCategory::all();

        return view('backend.setup.fee_category.view_fee_cat', compact('cat'));
    }

    public function feeCatAdd()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function feeCatStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Categoria de Taxa cadastrada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('fee.cat.view')->with($notificantion);
    }

    
    public function feeCatEdit($id)
    {
        $cat = FeeCategory::findOrFail($id);

        return view('backend.setup.fee_category.edit_fee_cat', compact('cat'));
    }
    

    public function feeCatUpdate(Request $request, $id)
    {
        $data = FeeCategory::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name'
            ]);
        
        $data->name = $request->name;
        $data->save();

        $notificantion = [
            'message' => 'Categoria de Taxa atualizada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('fee.cat.view')->with($notificantion);
    }

    public function feeCatDelete($id)
    {
        $fee = FeeCategory::findOrFail($id)->delete();

        $notificantion = [
            'message' => 'Categoria de Taxa removida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('fee.cat.view')->with($notificantion);

    }   
}
