<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Konten
            </h2>
            <a href="{{ route('admin.contents.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                + Buat Konten Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" class="mb-6">
                        <div class="relative">
                            <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari berdasarkan judul atau isi..."
                                   class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                    <th class="p-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="p-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($contents as $c)
                                    <tr>
                                        <td class="p-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $c->title }}</td>
                                        <td class="p-3 whitespace-nowrap text-center text-sm">
                                            @if($c->published)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Published
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Draft
                                                </span>
                                            @endif
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="{{ route('admin.contents.edit', $c) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                               <button type="button" 
            @click="$dispatch('open-delete-modal', { action: '{{ route('admin.contents.destroy', $c) }}' })" 
            class="text-red-600 hover:text-red-900">
        Hapus
    </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-6 text-center text-gray-500">Belum ada konten.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $contents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>