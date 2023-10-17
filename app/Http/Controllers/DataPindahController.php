<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\DataPindah;
use Illuminate\Http\Request;

class DataPindahController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;
        $data = DataPindah::whereHas('data_penduduk', function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.datapenduduk.pindah.Index', compact('data'));
    }
    public function Tambah()
    {

        $data = DataPenduduk::all();
        return view('content.datapenduduk.pindah.AddPindah', compact('data'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'data_penduduk_id' => 'required|integer',
            'tgl_pindah' => 'required|string',
            'sebab_pindah' => 'required|string',

        ]);
        $datapenduduk = DataPenduduk::where('id', $request['data_penduduk_id'])->first();
        $pindah = DataPindah::create([
            'data_penduduk_id' => $request->data_penduduk_id,
            'tgl_pindah' => $request->tgl_pindah,
            'sebab_pindah' => $request->sebab_pindah,
        ]);
        return redirect()->route('pindah')->with('message', 'Berhasil Menambahkan Data Pindah');
    }
    public function edit($id)
    {
        $data = DataPenduduk::all();
        $pindah = DataPindah::find($id);
        return view('content.datapenduduk.pindah.EditPindah', compact('data', 'pindah'));
    }
    public function update(Request $request, $id)
    {

        $pindah = DataPindah::find($id);
        $request->validate([
            'data_penduduk_id' => 'required|integer',
            'tgl_pindah' => 'required|string',
            'sebab_pindah' => 'required|string',

        ]);

        $pindah->update([
            'data_penduduk_id' => $request->data_penduduk_id,
            'tgl_pindah' => $request->tgl_pindah,
            'sebab_pindah' => $request->sebab_pindah,
        ]);


        return redirect()->route('pindah')->with('message', 'Berhasil Memperbarui Data Pindah');
    }
    public function delete($id)
    {

        DataPindah::destroy($id);
        return redirect()->route('pindah')->with('message', 'Data Berhasil Di Hapus Data Pindah');
    }
}
