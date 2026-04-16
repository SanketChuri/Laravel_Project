@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">Books List</h2>

@if(session('success'))
    <p class="text-green-600 mb-3">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p class="text-red-600 mb-3">{{ session('error') }}</p>
@endif

@if ($errors->any())
    <ul class="text-red-600 mb-3 list-disc pl-5">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<a href="{{ route('books.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg mb-4 hover:bg-blue-700">
    Add New Book
</a>

<div class="overflow-x-auto">
    <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Title</th>
                <th class="p-3 text-left">Author</th>
                <th class="p-3 text-left">Genre</th>
                <th class="p-3 text-left">Year</th>
                <th class="p-3 text-left">Quantity</th>
                <th class="p-3 text-left">Borrow</th>
                <th class="p-3 text-left">Return</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr class="border-t">
                    <td class="p-3">{{ $book->title }}</td>
                    <td class="p-3">{{ $book->author }}</td>
                    <td class="p-3">{{ $book->genre }}</td>
                    <td class="p-3">{{ $book->published_year }}</td>
                    <td class="p-3">{{ $book->quantity }}</td>

                    <td class="p-3">
                        <form action="{{ route('books.borrow', $book) }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="borrower_name" placeholder="Name" required
                                class="border border-gray-300 rounded px-2 py-1 w-28">
                            <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                Borrow
                            </button>
                        </form>
                    </td>

                    <td class="p-3">
                        <form action="{{ route('books.return', $book) }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="borrower_name" placeholder="Name" required
                                class="border border-gray-300 rounded px-2 py-1 w-28">
                            <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Return
                            </button>
                        </form>
                    </td>

                    <td class="p-3">
                        <div class="flex gap-3 items-center">
                            <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('books.edit', $book) }}" class="text-green-600 hover:underline">Edit</a>

                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this book?')"
                                    class="text-red-600 hover:underline bg-transparent p-0">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center p-4 text-gray-500">No books found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection