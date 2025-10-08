<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Http\Requests\StoreContentRequest; 
use App\Http\Requests\UpdateContentRequest;
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
    public function store(StoreContentRequest $request)
    {
        $validated = $request->validated();
        $validated['published'] = $request->boolean('published');
        Content::create($validated);
        return redirect()->route('admin.contents.index')->with('ok','Konten berhasil dibuat.');
    }

    public function edit(Content $content){ return view('admin.contents.edit',compact('content')); }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $validated = $request->validated();
        $validated['published'] = $request->boolean('published');
        $content->update($validated);
        return redirect()->route('admin.contents.index')->with('ok','Konten berhasil diupdate.');
    }
    
    public function destroy(Content $content){ $content->delete(); return back()->with('ok','Konten berhasil dihapus.'); }
}
