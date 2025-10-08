<x-app-layout>
  <x-slot name="header"><h2 class="font-semibold text-xl">Buat Konten</h2></x-slot>
  <div class="max-w-3xl mx-auto p-6">
    <form method="POST" action="{{ route('admin.contents.store') }}" class="space-y-4">
      @csrf
      <div>
        <label class="block font-medium">Judul</label>
        <input name="title" class="w-full border rounded p-2" value="{{ old('title') }}" required>
        @error('title')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>
      
      <div>
        <label for="body" class="block font-medium">Isi</label>
        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body" class="w-full border bg-white rounded p-2 min-h-[250px]"></trix-editor>
        @error('body')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>
      <label class="inline-flex items-center gap-2">
        <input type="checkbox" name="published" value="1" checked>
        <span>Publish</span>
      </label>
      <div class="flex gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        <a href="{{ route('admin.contents.index') }}" class="px-4 py-2 border rounded">Batal</a>
      </div>
    </form>
  </div>
</x-app-layout>