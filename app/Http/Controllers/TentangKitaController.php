<?php

namespace App\Http\Controllers;

use App\Models\TentangKita;
use Illuminate\Http\Request;

class TentangKitaController extends Controller
{
    public function Tambah()
    {
        $data = TentangKita::first();
        return view('settings.Setting', compact('data'));
    }
    public function send(Request $request)
    {
        TentangKita::truncate();

        $request->validate([
            'jdl_kita' => 'required|string',
            'desc_kita' => 'required|string',
        ]);

        TentangKita::create([
            'jdl_kita' => $request->jdl_kita,
            'desc_kita' => $request->desc_kita,
        ]);

        return redirect()->route('settings')->with('message', 'Berhasil Menambahkan Settings');

    }
}
