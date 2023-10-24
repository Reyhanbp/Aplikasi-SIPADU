<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Datakk;
use App\Models\DataPendatang;
use App\Models\DataPenduduk;
use App\Models\DataPindah;
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
        $datasan = Berita::all();
        $penduduk = DataPenduduk::count();
        $datakk = Datakk::count();
        $pendatang = DataPendatang::count();
        $pindah = DataPindah::count();

        return view('landingpages.home', compact('data','datas','datasan','penduduk','datakk','pendatang','pindah'));
    }
}
