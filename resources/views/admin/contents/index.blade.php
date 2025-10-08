<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl">Kelola Konten</h2>
      <a href="{{ route('admin.contents.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">+ Konten</a>
    </div>
  </x-slot>

  <form method="GET" class="mt-4 mb-3">
  <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Search title/body..."
         class="border rounded p-2 w-full md:w-80">
</form>

  <div class="max-w-5xl mx-auto p-6">
    @if(session('ok')) <div class="mb-4 text-green-700">{{ session('ok') }}</div> @endif

    <table class="w-full border">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-2 border">Judul</th>
          <th class="p-2 border">Publish</th>
          <th class="p-2 border w-48">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($contents as $c)
          <tr>
            <td class="p-2 border">{{ $c->title }}</td>
            <td class="p-2 border">{{ $c->published ? 'Ya' : 'Tidak' }}</td>
            <td class="p-2 border">
              <a class="text-blue-600 underline" href="{{ route('admin.contents.edit', $c) }}">Edit</a>
              <span class="px-2">|</span>
              <form class="inline" method="POST" action="{{ route('admin.contents.destroy', $c) }}" onsubmit="return confirm('Hapus konten ini?')">
                @csrf @method('DELETE')
                <button class="text-red-600 underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" class="p-4 text-center text-gray-500">Belum ada konten.</td></tr>
        @endforelse
      </tbody>
    </table>

    <div class="mt-4">{{ $contents->links() }}</div>
  </div>
</x-app-layout>
