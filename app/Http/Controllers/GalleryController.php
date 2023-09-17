<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        // $data = Pengumuman::all();
        $pagination = 5;
        $data = Gallery::where(function ($q) use ($request) {
            $q->where('jdl_gallery', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.gallery.Gallery', compact('data'));
    }
    public function tambah()
    {
        return view('content.gallery.AddGallery');
    }
    public function send(Request $request)
    {
        $request->validate([
            'jdl_gallery' => 'required|string',
            'gallery' => 'required|mimes:jpg,jpeg,png',

        ]);

        $file = $request->file('gallery');
        $fileName = $request->jdl_gallery . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('gallery', $fileName, 'public');
        Gallery::create([
            'jdl_gallery' => $request->jdl_gallery,
            'gallery' => $image,

        ]);

        return redirect()->route('gallery')->with('message', 'Berhasil Menambahkan Data Gallery');
    }
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('content.gallery.EditGallery', compact('gallery'));
    }
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $request->validate([
            'jdl_gallery' => 'required|string',
            'gallery' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('gallery')) {
            // Hapus gallery lama jika ada
            if ($gallery->gallery) {
                Storage::disk('public')->delete($gallery->gallery);
            }

            $file = $request->file('gallery');
            $fileName = $request->jdl_gallery . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('gallery', $fileName, 'public');

            // Update data dengan gallery baru
            $gallery->update([
                'jdl_gallery' => $request->jdl_gallery,
                'gallery' => $image,
            ]);
        } else {
            // Update data tanpa mengganti gallery
            $gallery->update([
                'jdl_gallery' => $request->jdl_gallery,
            ]);
        }

        return redirect()->route('gallery')->with('message', 'Berhasil Memperbarui Data Galery');
    }
    public function delete($id)
    {
        Gallery::destroy($id);
        return redirect()->route('gallery')->with('message', 'Data Berhasil Di Hapus Galery');
    }
}
