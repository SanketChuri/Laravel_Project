@extends('layouts.app')

@section('content')

<h2>Books List</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<a href="{{ route('books.create') }}">Add New Book</a>

<table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>

    @forelse($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->genre }}</td>
            <td>{{ $book->published_year }}</td>
            <td>{{ $book->quantity }}</td>
            <td>
                <a href="{{ route('books.show', $book) }}">View</a>
                <a href="{{ route('books.edit', $book) }}">Edit</a>

                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this book?')">Delete</button>
                </form>

                <form action="{{ route('books.borrow', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="text" name="borrower_name" placeholder="Borrower name" required>
                    <button type="submit">Borrow</button>
                </form>

                <form action="{{ route('books.return', $book) }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="text" name="borrower_name" placeholder="Return name" required>
                    <button type="submit">Return</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No books found</td>
        </tr>
    @endforelse

</table>

@endsection