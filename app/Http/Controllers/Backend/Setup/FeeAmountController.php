<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function viewFeeAmount()
    {
        //$amounts = FeeCategoryAmount::all();
        $amounts = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', compact('amounts'));
    }

    public function feeAmountAdd()
    {
        $data['feeCategories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function feeAmountStore(Request $request)
    {
        $countClass = count($request->class_id);
        if($countClass != NULL){
            for($i=0; $i<$countClass; $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();

            }
        }

        $notificantion = [
            'message' => 'Dados inseridos com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('fee.amount.view')->with($notificantion);


    }


    public function feeAmountEdit($fee_category_id)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)
                                             ->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }
}
