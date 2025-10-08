<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3 class="text-lg font-medium">Selamat Datang, {{ Auth::user()->name }}!</h3>
        <p class="text-gray-600 dark:text-gray-400">Anda masuk sebagai {{ ucwords(Auth::user()->role) }}.</p>
    </div>
</div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @if(in_array(auth()->user()->role, ['admin', 'superadmin']))
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-lg">Kelola Konten</h4>
                        <p class="text-gray-600 mt-2">Buat, edit, dan hapus artikel atau halaman untuk situs publik.</p>
                    </div>
                    <a href="{{ route('admin.contents.index') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm text-center">
                        Buka Manajemen Konten
                    </a>
                </div>
                @endif

                @if(auth()->user()->role === 'superadmin')
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-lg">Kelola Admin</h4>
                        <p class="text-gray-600 mt-2">Tambah, edit, atau hapus akun untuk admin lain.</p>
                    </div>
                    <a href="{{ route('superadmin.admins.index') }}" class="mt-4 inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg text-sm text-center">
                        Buka Manajemen Admin
                    </a>
                </div>
                @endif

                 <div class="bg-white p-6 rounded-lg shadow-md flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-lg">Profil Anda</h4>
                        <p class="text-gray-600 mt-2">Perbarui informasi pribadi dan ganti kata sandi Anda.</p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="mt-4 inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg text-sm text-center">
                        Edit Profil
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>