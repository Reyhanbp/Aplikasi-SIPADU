<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\Meninggal;
use Illuminate\Http\Request;

class MeninggalController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;
        $data = Meninggal::whereHas('data_penduduk',function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.datapenduduk.meninggal.Index', compact('data'));
    }
    public function Tambah()
    {

        $data = DataPenduduk::all();
        return view('content.datapenduduk.meninggal.AddMeninggal', compact('data'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'data_penduduk_id' => 'required|integer',
            'tgl_meninggal' => 'required|string',
            'sebab_meninggal' => 'required|string',

        ]);
        $datapenduduk = DataPenduduk::where('id', $request['data_penduduk_id'])->first();
        $meninggal = Meninggal::create([
            'data_penduduk_id' => $request->data_penduduk_id,
            'tgl_meninggal' => $request->tgl_meninggal,
            'sebab_meninggal' => $request->sebab_meninggal,
        ]);
        return redirect()->route('meninggal')->with('message', 'Berhasil Menambahkan Data Meninggal');
    }
    public function edit($id)
    {
        $data = DataPenduduk::all();
        $meninggal = Meninggal::find($id);
        return view('content.datapenduduk.meninggal.EditMeninggal', compact('data', 'meninggal'));
    }
    public function update(Request $request, $id)
    {

        $meninggal = Meninggal::find($id);
        $request->validate([
            'data_penduduk_id' => 'required|integer',
            'tgl_meninggal' => 'required|string',
            'sebab_meninggal' => 'required|string',

        ]);

        $meninggal->update([
            'data_penduduk_id' => $request->data_penduduk_id,
            'tgl_meninggal' => $request->tgl_meninggal,
            'sebab_meninggal' => $request->sebab_meninggal,
        ]);


        return redirect()->route('meninggal')->with('message', 'Berhasil Memperbarui Data Meninggal');
    }
    public function delete($id)
    {

        Meninggal::destroy($id);
        return redirect()->route('meninggal')->with('message', 'Data Berhasil Di Hapus Data Meninggal');
    }

}
