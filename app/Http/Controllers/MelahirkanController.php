<?php

namespace App\Http\Controllers;

use App\Models\AddAnggota;
use App\Models\Datakk;
use App\Models\Melahirkan;
use Illuminate\Http\Request;

class MelahirkanController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;
        $data = Melahirkan::where(function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.datapenduduk.melahirkan.Index', compact('data'));
    }
    public function Tambah()
    {

        $Datakk = Datakk::all();
        return view('content.datapenduduk.melahirkan.AddMelahirkan', compact('Datakk'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'data_kk_id' => 'required|integer',
            'tgl_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string',

        ]);
        $datapenduduk = Datakk::where('id', $request['data_kk_id'])->first();
        $datakk = Melahirkan::create([
            'name' => $request->name,
            'data_kk_id' => $request->data_kk_id,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->route('melahirkan')->with('message', 'Berhasil Menambahkan Data Kartu Keluarga');
    }
    public function edit($id)
    {
        $Datakk = Datakk::all();
        $melahirkan = Melahirkan::find($id);
        return view('content.datapenduduk.melahirkan.EditMelahirkan', compact('Datakk', 'melahirkan'));
    }
    public function update(Request $request, $id)
    {

        $melahirkan = Melahirkan::find($id);
        $request->validate([
            'name' => 'required|string',
            'data_kk_id' => 'required|integer',
            'tgl_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string',

        ]);

        $melahirkan->update([
            'name' => $request->name,
            'data_kk_id' => $request->data_kk_id,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);


        return redirect()->route('melahirkan')->with('message', 'Berhasil Memperbarui Data Melahirkan');
    }
    public function delete($id)
    {

        Melahirkan::destroy($id);
        return redirect()->route('melahirkan')->with('message', 'Data Berhasil Di Hapus Data Melahirkan');
    }


}
