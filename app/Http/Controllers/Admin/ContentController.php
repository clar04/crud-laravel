<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){ $contents=Content::latest()->paginate(10); return view('admin.contents.index',compact('contents')); }
    public function create(){ return view('admin.contents.create'); }
    public function store(Request $r){
        $d=$r->validate(['title'=>'required|max:255','body'=>'nullable','published'=>'boolean']);
        $d['published']=$r->boolean('published'); Content::create($d);
        return redirect()->route('admin.contents.index')->with('ok','Konten dibuat.');
    }
    public function edit(Content $content){ return view('admin.contents.edit',compact('content')); }
    public function update(Request $r, Content $content){
        $d=$r->validate(['title'=>'required|max:255','body'=>'nullable','published'=>'boolean']);
        $d['published']=$r->boolean('published'); $content->update($d);
        return redirect()->route('admin.contents.index')->with('ok','Konten diupdate.');
    }
    public function destroy(Content $content){ $content->delete(); return back()->with('ok','Konten dihapus.'); }
}
