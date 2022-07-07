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
        $amounts = FeeCategoryAmount::all();

        return view('backend.setup.fee_amount.view_fee_amount', compact('amounts'));
    }

    public function feeAmountAdd()
    {
        $data['feeCategories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }
}
