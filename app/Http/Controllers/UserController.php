<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.petugas', [
            'petugas' => User::where('id', '<>', Auth::user()->id)->orderby('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'unique:users,username', 'alpha_num', 'min:3', 'max:25'],
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:8'],
            'role' => ['required'],
        ]);
        User::create($request->all());
        notify()->success('Data Berhasil Ditambahkan', 'Berhasil');
        return back();

    }

    public function edit(User $petuga)
    {
        return response()->json([
            'data' => User::find($petuga)->first(),
        ]);
    }

    public function update(Request $request, $petuga)
    {
        $request->validate([
            'username2' => ['required', 'alpha_num', 'min:3', 'max:25'],
            'name2' => ['required', 'string', 'min:3'],
            'email2' => ['required', 'email'],
            'role2' => ['required'],
        ]);
        if ($request->password2 == ""){
        User::find($petuga)->update([
            'username' => $request->username2,
            'name' => $request->name2,
            'email' => $request->email2,
            'role' => $request->role2,
        ]);
        }else{
            User::find($petuga)->update([
                'username' => $request->username2,
                'name' => $request->name2,
                'email' => $request->email2,
                'password' => $request->password2,
                'role' => $request->role2,
            ]);
        }
        notify()->success('Data berhasil Diedit', 'Berhasil');
        return back();
    }

    public function destroy($petuga)
    {
        User::find($petuga)->delete();
        notify()->success('Data Berhasil Dihapus','Berhasil');
        return back();
    }
}
