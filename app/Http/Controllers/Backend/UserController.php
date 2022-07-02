<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        $data['allData'] = User::all();

        return view('backend.user.view_user', $data);
    }

    
    public function userAdd()
    {
          return view('backend.user.add_user');
    }
    
    public function create(Request $request)
    {
        $user = new User();
        $user = $request->all();
        $user->save();

        return redirect()->back();  
    }
}
