<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\TentangKita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return redirect('dashboard');
    }
    public function Index()
    {
        $data = TentangKita::all();
        $datas = Gallery::all();
        return view('landingpages.home', compact('data','datas'));
    }
}
