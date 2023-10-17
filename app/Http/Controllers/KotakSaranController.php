<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\KotakSaran;
use App\Models\User;
use Illuminate\Http\Request;

class KotakSaranController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $data = KotakSaran::whereHas('users',function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.kotaksaran.Kotaksaran', compact('data'));
    }

    public function tambah()
    {
        return view('content.kotaksaran.AddKotaksaran');
    }
    public function send(Request $request)
    {
        $request->validate([
            'desc_saran' => 'required',
        ]);
        $item = User::where('id', $request['users_id'])->first();
        KotakSaran::create([
            'users_id' => $request->users_id,
            'desc_saran' => $request->desc_saran,

        ]);

        return redirect()->route('kotaksaran')->with('message', 'Berhasil Menambahkan Data Saran');
    }
    public function edit($id)
    {
        $KotakSaran = KotakSaran::find($id);
        return view('content.kotaksaran.EditKotaksaran', compact('KotakSaran'));
    }
    public function update(Request $request, $id)
    {
        $KotakSaran = KotakSaran::find($id);
        $request->validate([
            'desc_saran' => 'required',
        ]);
        $KotakSaran->update([
            'users_id' => $request->users_id,
            'desc_saran' => $request->desc_saran,
        ]);

        return redirect()->route('kotaksaran')->with('message', 'Berhasil Memperbarui Data Saran');
    }
    public function delete($id)
    {
        KotakSaran::destroy($id);
        return redirect()->route('kotaksaran')->with('message', 'Data Berhasil Di Hapus Saran');
    }}
