<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(){ $admins=User::where('role','admin')->latest()->paginate(10); return view('superadmin.admins.index',compact('admins')); }
    public function create(){ return view('superadmin.admins.create'); }
    public function store(Request $r){
        $d=$r->validate(['name'=>'required|max:255','email'=>'required|email|unique:users','password'=>'required|min:6']);
        $d['password']=Hash::make($d['password']); $d['role']='admin'; User::create($d);
        return redirect()->route('superadmin.admins.index')->with('ok','Admin dibuat.');
    }
    public function edit(User $admin){ abort_unless($admin->role==='admin',404); return view('superadmin.admins.edit',compact('admin')); }
    public function update(Request $r, User $admin){
        abort_unless($admin->role==='admin',404);
        $d=$r->validate(['name'=>'required|max:255','email'=>'required|email|unique:users,email,'.$admin->id,'password'=>'nullable|min:6']);
        if(!empty($d['password'])) $d['password']=Hash::make($d['password']); else unset($d['password']);
        $admin->update($d); return redirect()->route('superadmin.admins.index')->with('ok','Admin diupdate.');
    }
    public function destroy(User $admin){ abort_unless($admin->role==='admin',404); $admin->delete(); return back()->with('ok','Admin dihapus.'); }
}
