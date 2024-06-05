<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.data_user', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Pastikan untuk mengenkripsi password
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        if (!$user) {
            // Tangani jika user tidak terotentikasi
            return redirect()->back()->with('error', 'User is not authenticated!');
        }
    
        // Lanjutkan dengan pemrosesan data profil jika user telah terotentikasi
    
        // Mengupdate atribut-atribut pengguna
        $user->name = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
    
        // Menyimpan perubahan pada profil pengguna
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}


