<x-guest-layout>
  <div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Konten</h1>

    <div class="space-y-4">
      @forelse ($contents as $c)
        <a href="{{ route('public.show', $c) }}" class="block p-4 border rounded hover:bg-gray-50">
          <h2 class="font-semibold">{{ $c->title }}</h2>
          <p class="text-sm text-gray-600">
            {{ \Illuminate\Support\Str::limit($c->body, 140) }}
          </p>
        </a>
      @empty
        <p>Tidak ada konten.</p>
      @endforelse
    </div>

    <div class="mt-6">{{ $contents->links() }}</div>

    <div class="mt-8">
      <a href="{{ route('login') }}" class="text-blue-600 underline">Login Admin</a>
    </div>
  </div>
</x-guest-layout>
