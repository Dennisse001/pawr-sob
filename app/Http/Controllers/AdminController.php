<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function admindashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.index', compact('profileData'));
    }
    public function adminlogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminprofilestore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->nama_lengkap = $request->nama_lengkap;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->alamat = $request->alamat;
        $data->email = $request->email;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            @unlink(storage_path('app/public/userimg/' . $data->foto));
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/userimg', $filename);
            $data->foto = $filename;
        }

        $data->save();
        return redirect()->back();
    }
}
