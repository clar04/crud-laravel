<x-app-layout>
  <x-slot name="header"><h2 class="font-semibold text-xl">Buat Admin</h2></x-slot>
  <div class="max-w-md mx-auto p-6">
    <form method="POST" action="{{ route('superadmin.admins.store') }}" class="space-y-4">
      @csrf
      <div><label class="block font-medium">Nama</label><input name="name" class="w-full border rounded p-2" required>@error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror</div>
      <div><label class="block font-medium">Email</label><input type="email" name="email" class="w-full border rounded p-2" required>@error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror</div>
      <div><label class="block font-medium">Password</label><input type="password" name="password" class="w-full border rounded p-2" required>@error('password')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror</div>
      <div class="flex gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        <a href="{{ route('superadmin.admins.index') }}" class="px-4 py-2 border rounded">Batal</a>
      </div>
    </form>
  </div>
</x-app-layout>
