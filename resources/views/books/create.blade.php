@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-6">Add New Book</h2>

@if ($errors->any())
    <ul class="text-red-600 mb-4 list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('books.store') }}" method="POST" class="space-y-4 max-w-lg">
    @csrf

    <div>
        <label class="block font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Author</label>
        <input type="text" name="author" value="{{ old('author') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Genre</label>
        <input type="text" name="genre" value="{{ old('genre') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Published Year</label>
        <input type="number" name="published_year" value="{{ old('published_year') }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Quantity</label>
        <input type="number" name="quantity" value="{{ old('quantity', 1) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex gap-3">
        <button type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
            Save Book
        </button>

        <a href="{{ route('books.index') }}"
            class="bg-gray-300 px-5 py-2 rounded-lg hover:bg-gray-400">
            Cancel
        </a>
    </div>
</form>

@endsection