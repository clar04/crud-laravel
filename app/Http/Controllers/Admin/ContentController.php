<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(\Illuminate\Http\Request $r)
{
    $q = $r->string('q')->toString();
    $contents = \App\Models\Content::when($q, fn($w) =>
        $w->where('title','like',"%$q%")->orWhere('body','like',"%$q%")
    )->latest()->paginate(10)->withQueryString();

    return view('admin.contents.index', compact('contents','q'));
}

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
