<?php

namespace App\Http\Controllers;

use App\Models\DataPendatang;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;

class DataPendatangController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;
        $data = DataPendatang::whereHas('data_penduduk', function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.datapenduduk.pendatang.Index', compact('data'));
    }
    public function Tambah()
    {

        $data = DataPenduduk::all();
        return view('content.datapenduduk.pendatang.AddPendatang', compact('data'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'NIK' => 'required|integer',
            'name' => 'required|string',
            'tgl_datang' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'pelapor_id' => 'required|integer',

        ]);
        $datapenduduk = DataPenduduk::where('id', $request['pelapor_id'])->first();
        $pendatang = DataPendatang::create([
            'NIK' => $request->NIK,
            'name' => $request->name,
            'tgl_datang' => $request->tgl_datang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pelapor_id' => $request->pelapor_id,
        ]);
        return redirect()->route('pendatang')->with('message', 'Berhasil Menambahkan Data Pendatang');
    }
    public function edit($id)
    {
        $data = DataPenduduk::all();
        $pendatang = DataPendatang::find($id);
        return view('content.datapenduduk.pendatang.EditPendatang', compact('data', 'pendatang'));
    }
    public function update(Request $request, $id)
    {

        $pendatang = DataPendatang::find($id);

        $request->validate([
            'NIK' => 'required|integer',
            'name' => 'required|string',
            'tgl_datang' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'pelapor_id' => 'required|integer',

        ]);
        $pendatang->update([
            'NIK' => $request->NIK,
            'name' => $request->name,
            'tgl_datang' => $request->tgl_datang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pelapor_id' => $request->pelapor_id,
        ]);


        return redirect()->route('pendatang')->with('message', 'Berhasil Memperbarui Data Pendatang');
    }
    public function delete($id)
    {

        DataPendatang::destroy($id);
        return redirect()->route('pendatang')->with('message', 'Data Berhasil Di Hapus Data Pendatang');
    }
}
