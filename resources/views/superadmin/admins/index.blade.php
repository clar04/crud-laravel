<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl">Kelola Admin</h2>
      <a href="{{ route('superadmin.admins.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">+ Admin</a>
    </div>
  </x-slot>

  <div class="max-w-5xl mx-auto p-6">
    @if(session('ok')) <div class="mb-4 text-green-700">{{ session('ok') }}</div> @endif
    <table class="w-full border">
      <thead class="bg-gray-100">
        <tr><th class="p-2 border">Nama</th><th class="p-2 border">Email</th><th class="p-2 border w-48">Aksi</th></tr>
      </thead>
      <tbody>
        @forelse($admins as $a)
          <tr>
            <td class="p-2 border">{{ $a->name }}</td>
            <td class="p-2 border">{{ $a->email }}</td>
            <td class="p-2 border">
              <a class="text-blue-600 underline" href="{{ route('superadmin.admins.edit', $a) }}">Edit</a>
              <span class="px-2">|</span>
              <form class="inline" method="POST" action="{{ route('superadmin.admins.destroy', $a) }}" onsubmit="return confirm('Hapus admin ini?')">
                @csrf @method('DELETE')
                <button class="text-red-600 underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" class="p-4 text-center text-gray-500">Belum ada admin.</td></tr>
        @endforelse
      </tbody>
    </table>
    <div class="mt-4">{{ $admins->links() }}</div>
  </div>
</x-app-layout>
