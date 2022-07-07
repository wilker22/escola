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
    
    public function userStore(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);
        

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = [
            'message' => "Usuário cadastrado com sucesso!",
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
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        
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
