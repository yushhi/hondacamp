<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Htpp\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    // public function redirectTo()
    // {
    //     $role = Auth::user()->role;

    //     switch($role) {
    //         case 'admin':
    //             return '/dashboard';
    //         break;
    //         case 'user':
    //             return '/';
    //         break;
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $categories = Category::with('subcategory');
        return view('auth.register')->with('categories', $categories);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,bmp,svg,png','max:5000'],
            'nomer_wa' => ['required'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'category_id' => ['required'],
            'subcategory_id' => ['required'],
            'nomer_angka' => ['required'],
            'nomer_mesin' => ['required'],
            'alamat' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $categories = Category::get();


        if(request()->has('avatar')){
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => '/images/' . $avatarname,
                'nomer_wa' => $data['nomer_wa'],
                'password' => Hash::make($data['password']),
                'category_id' => $data['category_id'],
                'subcategory_id' => $data['subcategory_id'],
                'nomer_angka' => $data['nomer_angka'],
                'nomer_mesin' => $data['nomer_mesin'],
                'alamat' => $data['alamat'],
                'role' => 'pending'
            ]);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nomer_wa' => $data['nomer_wa'],
            'password' => Hash::make($data['password']),
            'category_id' => $data['category_id'],
            'subcategory_id' => $data['subcategory_id'],
            'nomer_angka' => $data['nomer_angka'],
            'nomer_mesin' => $data['nomer_mesin'],
            'alamat' => $data['alamat'],
            'role' => 'pending'
        ]);

        return view('auth.register')->with('categories', $categories);
    }
}
