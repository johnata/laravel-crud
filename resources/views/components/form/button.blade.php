@props([
    'type' => 'primary', // primary, secondary, danger, link
    'link' => '#',
    'method' => 'GET' // Método HTTP (GET, POST, DELETE, etc.)
])

@php
    $classes = match ($type) {
        'primary' => 'bg-blue-500 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-500 hover:bg-gray-700 text-white',
        'danger' => 'bg-red-500 hover:bg-red-700 text-white',
        'link' => 'text-blue-500 hover:text-blue-700 underline',
        default => 'bg-gray-300 hover:bg-gray-500 text-black',
    };
@endphp

@if($method === 'DELETE')
    <form action="{{ $link }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md {{ $classes }}">
            <span>{{ $slot }}</span>
        </button>
    </form>
@elseif($method === 'submit')
    <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md {{ $classes }}">
        <span>{{ $slot }}</span>
    </button>
@else
    <a href="{{ $link }}" class="inline-flex items-center px-4 py-2 rounded-md {{ $classes }}">
        <span class="flex items-center">{{ $slot }}</span>
    </a>
@endif
