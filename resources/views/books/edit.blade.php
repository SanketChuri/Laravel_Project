@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-6">Edit Book</h2>

@if ($errors->any())
    <ul class="text-red-600 mb-4 list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('books.update', $book) }}" method="POST" class="space-y-4 max-w-lg">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-medium mb-1">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Author</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Genre</label>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Published Year</label>
        <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label class="block font-medium mb-1">Quantity</label>
        <input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="flex gap-3">
        <button type="submit"
            class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
            Update Book
        </button>

        <a href="{{ route('books.index') }}"
            class="bg-gray-300 px-5 py-2 rounded-lg hover:bg-gray-400">
            Cancel
        </a>
    </div>
</form>

@endsection