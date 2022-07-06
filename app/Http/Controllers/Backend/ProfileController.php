<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
