<x-guest-layout>
  <div class="max-w-3xl mx-auto bg-white p-6 sm:p-8 lg:p-10 rounded-lg shadow-md">
    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 mb-6 group">
        <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke semua konten
    </a>

    <header class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">{{ $content->title }}</h1>
        <p class="mt-3 text-sm text-gray-500">
            Dipublikasikan pada {{ $content->created_at->format('d F Y') }}
        </p>
    </header>

    <div class="prose max-w-none prose-indigo">
      {!! nl2br(e($content->body)) !!}
    </div>
  </div>
</x-guest-layout>