<?php

namespace App\Http\Controllers;

use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    public function Index(Request $request)
    {
        $pagination = 5;

        $data = UserGroup::where(function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('content.usergroup.UserGroup', compact('data'));
    }
    public function Tambah()
    {
        return view('content.usergroup.AddUserGroup');
    }
    public function Edit($id)
    {
        $usergroup = UserGroup::find($id);
        return view('content.usergroup.EditUserGroup', compact('usergroup'));
    }
    public function Update(Request $request, $id)
    {
        $usergroup = UserGroup::find($id);
        $usergroup->update($request->all());
        return redirect()->route('user-group')->with('message', 'Berhasil Memperbarui Data User-Group');
        ;
    }
    public function Delete($id)
    {
        UserGroup::destroy($id);
        return redirect()->route('user-group')->with('message', 'Berhasil Menghapus Data User-Group');
        ;
    }
    public function Send(Request $request)
    {
        UserGroup::create($request->all());
        return redirect()->route('user-group')->with('message', 'Berhasil Menambahkan Data User-Group');

    }
}
