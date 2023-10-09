<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function Index(Request $request)
    {
        $pagination = 5;
        $data = User::where(function($q) use ($request) {
            $q->where('name', 'LIKE', '%'.$request->search.'%');
        })->orderBy('id','asc')->paginate($pagination);
        return view('content.user.User', compact('data'));
    }
    public function Get()
    {
        $data = User::all();
        return view('content.user.User', compact('data'));
    }
    public function profile() {

        $DataUserGroup = UserGroup::all();
        return view('content.user-profile', compact('DataUserGroup'));
    }
    public function Tambah() {

        $DataUserGroup = UserGroup::all();
        $DataPenduduk = DataPenduduk::all();
        return view('content.user.AddUser', compact('DataUserGroup','DataPenduduk'));
    }
    public function Edit($id){
        $availableLevels = ['admin', 'warga']; // Daftar level yang tersedia
        $DataUserGroup = UserGroup::all();
        $DataPenduduk = DataPenduduk::all();
        $user =  User::find($id);
        return view('content.user.EditUser', compact('user','DataUserGroup','availableLevels'));
    }
    public function Update(Request $request, $id){
        $user =  User::find($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'user_group_id' => 'required',
            'data_penduduk_id' => 'required',
            'jenis_kelamin' => 'required',
            'profil' => 'nullable|mimes:jpg,jpeg,png',
        ]);

        $request['password'] = bcrypt($request['password']);


        if ($request->hasFile('profil')) {
            // Hapus foto lama jika ada
            if ($user->profil) {
                Storage::disk('public')->delete($user->profil);
            }

            $file = $request->file('profil');
            $fileName = $request->name . '.' . $file->getClientOriginalName();

            $image = $file->storeAs('profil', $fileName, 'public');

            // Update data dengan foto baru
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'level' => $request->level,
                'user_group_id' => $request->user_group_id,
                'data_penduduk_id' => $request->data_penduduk_id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'profil' => $image
            ]);
        } else {
            // Update data tanpa mengganti foto
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'level' => $request->level,
                'user_group_id' => $request->user_group_id,
                'data_penduduk_id' => $request->data_penduduk_id,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        }



        return redirect() -> route('user')->with('message','Berhasil Memperbarui Data User');
    }
    public function Delete($id){
        user::destroy($id);
      return redirect() -> route('user')->with('message','Berhasil Menghapus Data User');
    }
    public function Send(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'user_group_id' => 'required|integer',
            'data_penduduk_id' => 'required|integer',
            'jenis_kelamin' => 'required',
            'profil' => 'required',
        ]);


        $request['password'] = bcrypt($request['password']);
        $data = UserGroup::where('id', $request['user_group_id']);
        $item = DataPenduduk::where('id', $request['data_penduduk_id']);
        $file = $request->file('profil');
        $fileName = $request->name . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('profil', $fileName, 'public');
        User::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'password' => $request-> password,
            'level' => $request-> level,
            'user_group_id' => $request->user_group_id,
            'data_penduduk_id' => $request->data_penduduk_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'profil' => $image
        ]);


        return redirect() -> route('user')->with('message','Berhasil Menambahkan Data User ');

    }
}
