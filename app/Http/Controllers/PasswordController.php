<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('edit-password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect('edit-password')->with('statusEditPassword', 'Password berhasih dirubah');
    }
}
