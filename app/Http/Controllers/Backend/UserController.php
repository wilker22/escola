<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        $data['allData'] = User::where('usertype','Admin')->get();
        //dd($data);
        return view('backend.user.view_user', $data);
    }

    
    public function userAdd()
    {
          return view('backend.user.add_user');
    }
    
    public function userStore(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);
        

        $data = new User();
        $code = rand(000000,999999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();

        $notification = [
            'message' => "Dados cadastrados com sucesso!",
            'alert-type' => 'success'
        ];

        return redirect()->route('user.view')->with($notification);  
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);  
        return view('backend.user.edit_user', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
               
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        
        $user->save();

        $notification = [
            'message' => "Usuário atualizado com sucesso!",
            'alert-type' => 'success'
        ];

        return redirect()->route('user.view')->with($notification);  
    }

    public function userDestroy($id)
    {
               
        $user = User::findOrFail($id)->delete();
        $notification = [
            'message' => "Usuário Removido com sucesso!",
            'alert-type' => 'success'
        ];

        return redirect()->route('user.view')->with($notification); 
    }

    

}
