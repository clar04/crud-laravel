<x-app-layout>
  <x-slot name="header"><h2 class="font-semibold text-xl">Edit Admin</h2></x-slot>
  <div class="max-w-md mx-auto p-6">
    <form method="POST" action="{{ route('superadmin.admins.update', $admin) }}" class="space-y-4">
      @csrf @method('PUT')
      <div><label class="block font-medium">Nama</label><input name="name" class="w-full border rounded p-2" value="{{ old('name', $admin->name) }}" required>@error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror</div>
      <div><label class="block font-medium">Email</label><input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email', $admin->email) }}" required>@error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror</div>
      <div><label class="block font-medium">Password (opsional)</label><input type="password" name="password" class="w-full border rounded p-2">@error('password')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror</div>
      <div class="flex gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        <a href="{{ route('superadmin.admins.index') }}" class="px-4 py-2 border rounded">Batal</a>
      </div>
    </form>
  </div>
</x-app-layout>
