<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporandatapenduduk(Request $request)
    {
        return view('laporan.datapenduduk.Index');
    }
    public function indexdatapenduduk(Request $request, $tglawal, $tglakhir)
    {
        $data = DataPenduduk::whereBetween('created_at', [$tglawal, $tglakhir])
            ->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            })
            ->orderBy('id', 'asc')
            ->get();

        return view('laporan.datapenduduk.datapenduduk', compact('data', 'tglawal', 'tglakhir'));
        }
}
