<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // $data = Pengumuman::all();
        $pagination = 5;
        $data = Berita::where(function ($q) use ($request) {
            $q->where('jdl_berita', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.berita.Berita', compact('data'));
    }

    public function tambah()
    {
        return view('content.berita.AddBerita');
    }
    public function send(Request $request)
    {
        $request->validate([
            'jdl_berita' => 'required|string',
            'desc_berita' => 'required|string',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'link' => 'nullable'
        ]);

        $file = $request->file('foto');
        $fileName = $request->jdl_berita . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('foto', $fileName, 'public');
        Berita::create([
            'jdl_berita' => $request->jdl_berita,
            'desc_berita' => $request->desc_berita,
            'foto' => $image,
            'link' => $request->link
        ]);

        return redirect()->route('berita')->with('message', 'Berhasil Menambahkan Data Berita');
    }
    public function edit($id)
    {
        $Berita = Berita::find($id);
        return view('content.berita.EditBerita', compact('Berita'));
    }
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $request->validate([
            'jdl_berita' => 'required|string',
            'desc_berita' => 'required|string',
            'foto' => 'nullable|mimes:jpg,jpeg,png',
            'link' => 'nullable'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }

            $file = $request->file('foto');
            $fileName = $request->jdl_berita . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('foto', $fileName, 'public');

            // Update data dengan foto baru
            $berita->update([
                'jdl_berita' => $request->jdl_berita,
                'desc_berita' => $request->desc_berita,
                'foto' => $image,
                'link' => $request->link
            ]);
        } else {
            // Update data tanpa mengganti foto
            $berita->update([
                'jdl_berita' => $request->jdl_berita,
                'desc_berita' => $request->desc_berita,
                'link' => $request->link
            ]);
        }

        return redirect()->route('berita')->with('message', 'Berhasil Memperbarui Data Berita');
    }
    public function delete($id)
    {
        Berita::destroy($id);
        return redirect()->route('berita')->with('message', 'Data Berhasil Di Hapus Berita');
    }

    // tes detail berita
    public function detail($id)
    {
        $berita = Berita::find($id);

        if ($berita) {
            return view('landingpages.detailberita', compact('berita'));
        } else {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }
    }

    // tes UI
    public function berita()
    {
        return view('landingpages.berita');
    }
}
