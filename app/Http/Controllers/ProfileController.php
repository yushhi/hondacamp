<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Image;

class ProfileController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('profile', compact('users'));
    }
    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        return view('profile', [
            'user' => $request->user()
        ]);
    }


    public function update(Request $request)
    {
        $request->user()->update(
            $request->all()
        );

        if($request->hasFile('avatar')){
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            
            $user = Auth::user();
            $user->avatar = $avatarname;
            $user->save();
        }

        if($request->hasFile('coverbg')){
            $coveruploaded = request()->file('coverbg');
            $covername = time() . '.' . $coveruploaded->getClientOriginalExtension();
            $coverpath = public_path('/images/');
            $coveruploaded->move($coverpath, $covername);
            
            $user = Auth::user();
            $user->coverbg = $covername;
            $user->save();
        }
    //    return redirect()->route('profile.edit', array('user' => Auth::user()))->with('statusEditProfile', 'Data berhasih diperbarui');
        return redirect()->route('profile.edit', array('user' => Auth::user()))->with('statusEditProfile', 'Profile berhasih diperbarui');
    }
    
}
