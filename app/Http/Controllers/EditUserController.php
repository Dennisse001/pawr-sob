<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditUserController extends Controller
{
    public function showUser()
    {
        $userData = User::all();
        return view('admin.user.user', compact('userData'));
    }
    public function edituser($id)
    {

            $userr = User::find($id);

            if (!$userr) {
                return redirect()->route('showsuser')->with('error', 'Data user tidak ditemukan');
            }
            return view('admin.user.edituser', compact('userr'));
        }

        public function updateuser(Request $request, $id)
        {
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('showsuser')->with('error', 'Data user tidak ditemukan');
            }
            $user->nama_lengkap = $request->nama_lengkap;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->role = $request->role;

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                @unlink(storage_path('app/public/userimg/' . $user->foto));
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/userimg', $filename);
                $user->foto = $filename;
            }
            $user->save();

            return redirect()->route('showsuser')->with('success', 'Data user berhasil diperbarui');
        }
    public function hapususer($id)
{

    $user = User::find($id);
    if (!$user) {
        return redirect()->route('showsuser')->with('error', 'Data user tidak ditemukan');
    }
    $user->delete();

    return redirect()->route('showsuser')->with('success', 'Data user berhasil dihapus');
}
}
    