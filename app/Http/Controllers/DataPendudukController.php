<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataPendudukController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;
        $data = DataPenduduk::where(function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.datapenduduk.datapenduduk.DataPenduduk', compact('data'));
    }
    public function Tambah()
    {

        $Datapenduduk = DataPenduduk::all();
        return view('content.datapenduduk.datapenduduk.AddDataPenduduk', compact('Datapenduduk'));
    }
    public function send(Request $request)
    {
        $request->validate([
            'NIK' => 'required|integer',
            'name' => 'required|string',
            'tmpt_lahir' => 'required|string',
            'tgl_lahir' => 'required',
            'desa_kelurahan' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'status' => 'required',
            'file_foto' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('file_foto');
        $fileName = $request->name . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('file_foto', $fileName, 'public');
        DataPenduduk::create([
            'NIK' => $request->NIK,
            'name' => $request->name,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'desa_kelurahan' => $request->desa_kelurahan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'status' => $request->status,
            'file_foto' => $image,
        ]);

        return redirect()->route('datapenduduk')->with('message', 'Berhasil Menambahkan Data Penduduk');
    }
    public function edit($id)
    {
        $statusList = ['sudah nikah', 'belum nikah', 'cerai mati','cerai hidup']; //list status
        $agamaList = ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'khonghucu']; // Daftar agama yang tersedia
        $datapenduduk = DataPenduduk::find($id);
        return view('content.datapenduduk.datapenduduk.EditDataPenduduk', compact('datapenduduk','agamaList','statusList'));
    }
    public function update(Request $request, $id)
    {
        $datapenduduk = DataPenduduk::find($id);
        $request->validate([
            'NIK' => 'required|integer',
            'name' => 'required|string',
            'tmpt_lahir' => 'required|string',
            'tgl_lahir' => 'required',
            'desa_kelurahan' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'status' => 'required',
            'file_foto' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('file_foto')) {
            // Hapus foto lama jika ada
            if ($datapenduduk->file_foto) {
                Storage::disk('public')->delete($datapenduduk->file_foto);
            }

            $file = $request->file('file_foto');
            $fileName = $request->name . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('file_foto', $fileName, 'public');

            // Update data dengan foto baru
            $datapenduduk->update([
                'NIK' => $request->NIK,
                'name' => $request->name,
                'tmpt_lahir' => $request->tmpt_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'desa_kelurahan' => $request->desa_kelurahan,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'agama' => $request['agama'],
                'pekerjaan' => $request->pekerjaan,
                'status' => $request['status'],
                'file_foto' => $image,
            ]);
        } else {
            // Update data tanpa mengganti foto
            $datapenduduk->update([
                'NIK' => $request->NIK,
                'name' => $request->name,
                'tmpt_lahir' => $request->tmpt_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'desa_kelurahan' => $request->desa_kelurahan,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'agama' => $request['agama'],
                'pekerjaan' => $request->pekerjaan,
                'status' => $request['status'],
            ]);
        }

        return redirect()->route('datapenduduk')->with('message', 'Berhasil Memperbarui Data Penduduk');
    }
    public function delete($id)
    {
        DataPenduduk::destroy($id);
        return redirect()->route('datapenduduk')->with('message', 'Data Berhasil Di Hapus Data Penduduk');
    }


}
