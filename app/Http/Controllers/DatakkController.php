<?php

namespace App\Http\Controllers;

use App\Models\AddAnggota;
use App\Models\Datakk;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;

class DatakkController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;
        $data = Datakk::whereHas('data_penduduk', function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.datakk.Datakk', compact('data'));
    }
    public function Tambah()
    {

        $Datakk = DataPenduduk::all();
        return view('content.datakk.AddDatakk', compact('Datakk'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|integer',
            'kepala_keluarga_id' => 'required|integer',
            'desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',

        ]);
        $datapenduduk = DataPenduduk::where('id', $request['kepala_keluarga_id'])->first();
        $datakk = Datakk::create([
            'no_kk' => $request->no_kk,
            'kepala_keluarga_id' => $request->kepala_keluarga_id,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,

        ]);
        if ($datapenduduk) {
            $datapenduduk->update(['data_kk_id' => $datakk->id]);
        }

        return redirect()->route('data-kk')->with('message', 'Berhasil Menambahkan Data Kartu Keluarga');
    }
    public function edit($id)
    {
        $DataPenduduk = DataPenduduk::all();
        $datakk = Datakk::find($id);
        return view('content.datakk.EditDatakk', compact('datakk', 'DataPenduduk'));
    }
    public function update(Request $request, $id)
    {
        $datakk = Datakk::find($id);
        $request->validate([
            'no_kk' => 'required|integer',
            'kepala_keluarga_id' => 'required|integer',
            'desa' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',
        ]);

        $datakk->update([
            'no_kk' => $request->no_kk,
            'kepala_keluarga_id' => $request->kepala_keluarga_id,
            'desa' => $request->desa,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
        ]);


        return redirect()->route('data-kk')->with('message', 'Berhasil Memperbarui Data Kartu Keluarga');
    }
    public function delete($id)
    {
        Datakk::destroy($id);
        return redirect()->route('data_kk')->with('message', 'Data Berhasil Di Hapus Data Kartu Keluarga');
    }




    //add anggota kartu keluarga

    public function Show($id)
    {
        $DataPenduduk = DataPenduduk::all();
        $Datakk = Datakk::find($id);

        if (!$Datakk) {
            return redirect()->back()->with('error', 'Data KK tidak ditemukan.');
        }

        $anggotaKk = $Datakk->addanggota;
 
        return view('content.datakk.AddAnggotaKK',  compact('Datakk', 'DataPenduduk', 'anggotaKk'));
    }
    public function sendanggota(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|integer',
            'hub_keluarga' => 'required|string',
        ]);
        $datapenduduk = DataPenduduk::where('id', $request['anggota_id'])->first();
        AddAnggota::create([
            'kk_id' => $request->kk_id,
            'anggota_id' => $request->anggota_id,
            'hub_keluarga' => $request->hub_keluarga,
        ]);
        if ($datapenduduk) {
            $datapenduduk->update(['data_kk_id' => $request->kk_id]);
        }


        return redirect()->route('addanggota-data-kk', ['id' => $request->kk_id])
            ->with('message', 'Berhasil Menambahkan Anggota Kartu Keluarga');
    }
    public function deleteanggota(Request $request, $id)
    {
        $anggota = AddAnggota::find($id);

        if (!$anggota) {
            return redirect()->back()->with('error', 'Anggota tidak ditemukan.');
        }

        $kk_id = $anggota->kk_id;
        $anggota->delete();

        // Hitung jumlah anggota lain dengan kk_id yang sama
        $count = AddAnggota::where('kk_id', $kk_id)->count();

        if ($count === 0) {
            // Hapus kk_id dari datapenduduk jika tidak ada anggota lagi dengan kk_id yang sama
            $datapenduduk = DataPenduduk::where('id', $anggota->anggota_id)->first();
            if ($datapenduduk) {
                $datapenduduk->update(['data_kk_id' => null]);
            }
        }

        return redirect()->route('addanggota-data-kk', ['id' => $id])
            ->with('message', 'Data Berhasil Di Hapus Anggota Kartu Keluarga');
    }

}
