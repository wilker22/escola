<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profileView()
    {
       $id = Auth::id();
       $user = User::findOrFail($id);
       
       return view('backend.user.view_profile', compact('user'));
    }

    public function profileEdit()
    {
       $id = Auth::id();
       $userEdit = User::findOrFail($id);
       
       return view('backend.user.edit_profile', compact('userEdit'));
    }

    public function profileStore(Request $request)
    {
      $profile = User::find(Auth::id());
      $profile->name = $request->name;
      $profile->email = $request->email;
      $profile->mobile = $request->mobile;
      $profile->address = $request->address;
      $profile->gender = $request->gender;

      if($request->file('image')){
         $file = $request->file('image');
         @unlink(public_path('upload/user_images/'.$profile->image));
         $filename = date('dmYHi').$file->getClientOriginalName();
         $file->move(public_path('upload/user_images/'),$filename);
         $profile['image'] = $filename;
      }
      
      $profile->save();

      $notification = [
         'message' => 'Perfil do usuário atualizado com sucesso!',
         'alert-type' => 'success'
      ];

      return redirect()->route('profile.view')->with('$notification');
      

    }

    public function passwordView()
    {
      return view('backend.user.edit_password');
    }

    public function passwordUpdate(Request $request)
    {
      $validationData = $request->validate([
         'oldpassword' => 'required',
         'password' => 'required|confirmed',
      ]);

      $hashasedPassword = Auth::user()->password;
      if(Hash::check($request->oldpassword, $hashasedPassword)){
         $user = User::find(Auth::id());
         $user->password = Hash::make($request->password);
         $user->save();
         Auth::logout();

         return redirect()->route('login');
      }else{
         return redirect()->back();
      }

    }
}
