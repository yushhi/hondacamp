<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artikel;

class AdminController extends Controller
{

    public function index()
    {
        $artikels = Artikel::latest()->simplePaginate(5);
        return view('admin.dashboard', compact('artikels'));
    }

    public function create()
    {
        return view('admin.create');
    }
}
