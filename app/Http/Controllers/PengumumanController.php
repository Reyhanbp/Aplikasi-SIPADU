<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
     public function index(Request $request)
    {
        // $data = Pengumuman::all();
        $pagination = 5;
        $data = Pengumuman::where(function ($q) use ($request) {
            $q->where('jdl_pengumuman', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.pengumuman.Pengumuman', compact('data'));
    }
     public function pengumuman(Request $request)
    {
        // $data = Pengumuman::all();
        $pagination = 5;
        $pengumuman = Pengumuman::where(function ($q) use ($request) {
            $q->where('jdl_pengumuman', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.pengumuman.detail', compact('pengumuman'));
    }
    public function tambah()
    {
        $data = Pengumuman::all();
        return view('content.pengumuman.AddPengumuman', compact('data'));
    }
    public function send(Request $request)
    {
        $request->validate([
            'jdl_pengumuman' => 'required|string',
            'pengumuman' => 'required|string',
            'file' => 'nullable|file',
            'link' => 'nullable|string'
        ]);
        $file = $request->file('file');
        $fileName = $request->jdl_pengumuman . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('file', $fileName, 'public');
        Pengumuman::create([
            'jdl_pengumuman' => $request->jdl_pengumuman,
            'pengumuman' => $request->pengumuman,
            'file' => $image,
            'link' => $request->link
        ]);

        return redirect()->route('pengumuman')->with('message', 'Berhasil Menambahkan Data Pengumuman');
    }
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('content.pengumuman.EditPengumuman', compact('pengumuman'));
    }
    public function update(Request $request, $id)
    {
        $pengumuman = pengumuman::find($id);
        $request->validate([
            'jdl_pengumuman' => 'required|string',
            'pengumuman' => 'required|string',
            'file' => 'nullable|file',
            'link' => 'nullable|string'
        ]);

        if ($request->hasFile('file')) {
            // Hapus pengumuman lama jika ada
            if ($pengumuman->file) {
                Storage::disk('public')->delete($pengumuman->file);
            }

            $file = $request->file('file');
            $fileName = $request->jdl_pengumuman . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('file', $fileName, 'public');

            // Update data dengan pengumuman baru
            $pengumuman->update([
                'jdl_pengumuman' => $request->jdl_pengumuman,
                'pengumuman' => $request->pengumuman,
                'file' => $image,
                'link' => $request->link
            ]);
        } else {
            // Update data tanpa mengganti pengumuman
            $pengumuman->update([
                'jdl_pengumuman' => $request->jdl_pengumuman,
                'pengumuman' => $request->pengumuman,
                'link' => $request->link
            ]);
        }
        return redirect()->route('pengumuman')->with('message', 'Berhasil Mengedit Data Pengumuman');
    }
    public function delete($id)
    {
        Pengumuman::destroy($id);
        return redirect()->route('pengumuman')->with('message', 'Data Berhasil Menghapus Data Pengumuman');
    }
    public function detail($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('content.pages.admin.pengumuman.DetailPengumuman', compact('pengumuman'));
    }

}
