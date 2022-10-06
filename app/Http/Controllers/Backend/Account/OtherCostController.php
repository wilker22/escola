<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountOtherCost;
use Illuminate\Http\Request;

class OtherCostController extends Controller
{
    public function otherCostView()
    {
        $data['allData'] =  AccountOtherCost::orderBy('id', 'desc')->get();
        return view('backend.account.other_cost.other_cost_view', $data);

    }

    public function OtherCostAdd()
    {
    	return view('backend.account.other_cost.other_cost_add');
    }


    public function otherCostStore(Request $request)
    {
        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image'] = $filename;

        }

        $cost->description = $request->description;
        $cost->save();

        $notification = [
            'message' => 'Despesa inserida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('other.cost.view')->with($notification);
    }

    public function otherCostEdit($id)
    {
        $data['editData'] = AccountOtherCost::find($id);
        return view('backend.account.other_cost.other_cost_edit', $data);
    }

    public function otherCostUpdate(Request $request, $id)
    {
        $cost = AccountOtherCost::find($id);
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;

        if($request->file('image')){
            $file = $request->file('image');
            unlink(public_path('upload/cost_images/'.$cost->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();

        $notification = [
            'message' => 'Despesa atualizada com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('other.cost.view')->with($notification);
    }
}
