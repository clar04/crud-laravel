<x-guest-layout>
  <div class="max-w-3xl mx-auto py-8">
    <a href="{{ route('home') }}" class="text-sm underline text-gray-600">← Back</a>
    <h1 class="text-3xl font-bold mt-2 mb-4">{{ $content->title }}</h1>
    <div class="prose max-w-none">
      {!! nl2br(e($content->body)) !!}
    </div>
  </div>
</x-guest-layout>
