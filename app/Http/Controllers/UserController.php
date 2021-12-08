<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cache;
use App\User;
use App\CategoryJenisMobil;

class UserController extends Controller
{

    /**
     * Show user online status.
     *
     */

    // public function createUser()
    // {
    //     $categories = CategoryJenisMobil::all();
    //     return view('auth.register')->with('categories' , $categories);;
    // }
    
    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();
    
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }

    public function pendingUser()
	{
		return view('pendinguser');
	}

    public function viewUser()
    {
        // $users = User::all();
        $users = User::latest()->paginate(1);
        return view('admin.dashboard', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
		return view('admin.edit-user', compact('user'));

        // $user = User::where('id', $id)->first();
        // return view('dashboard', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
		$user->update($request->all());

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomer_wa' => $request->nomer_wa,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'angkatan' => $request->angkatan,
        ]);

        return redirect('dashboard')->with('statusUser', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('dashboard')->with('statusUser', 'Data Berhasil Dihapus');
    }
}
