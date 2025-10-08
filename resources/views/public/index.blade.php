<x-guest-layout>
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Selamat Datang di Blog Kami</h1>
            <p class="mt-4 text-lg leading-8 text-gray-600">Temukan artikel dan konten menarik seputar teknologi dan pengembangan.</p>
        </div>

        <form method="GET" class="mb-8 max-w-lg mx-auto">
            <div class="relative">
                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Cari artikel..."
                       class="w-full px-4 py-3 border border-gray-300 rounded-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition">
                <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-4">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($contents as $c)
                <a href="{{ route('public.show', $c) }}" class="block group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <h2 class="text-xl font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">{{ $c->title }}</h2>
                    <p class="text-sm text-gray-500 mt-2 mb-4">Dipublikasikan pada {{ $c->created_at->format('d M Y') }}</p>
                    <p class="text-gray-600 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit($c->body, 150) }}
                    </p>
                    <div class="mt-4 text-indigo-600 font-semibold group-hover:underline">
                        Baca Selengkapnya &rarr;
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                    <p class="text-gray-500 text-xl">Tidak ada konten yang ditemukan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $contents->links() }}
        </div>
    </div>
</x-guest-layout>