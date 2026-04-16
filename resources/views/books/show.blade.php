@extends('layouts.app')

@section('content')

<h2>Book Details</h2>

<p><strong>Title:</strong> {{ $book->title }}</p>
<p><strong>Author:</strong> {{ $book->author }}</p>
<p><strong>Genre:</strong> {{ $book->genre }}</p>
<p><strong>Published Year:</strong> {{ $book->published_year }}</p>
<p><strong>Quantity:</strong> {{ $book->quantity }}</p>

<hr>

<h3>Borrow History</h3>

<table border="1" cellpadding="10">
    <tr>
        <th>Borrower</th>
        <th>Borrowed At</th>
        <th>Returned At</th>
        <th>Status</th>
    </tr>

    @forelse($book->borrowRecords as $record)
        <tr>
            <td>{{ $record->borrower_name }}</td>
            <td>{{ $record->borrowed_at }}</td>
            <td>{{ $record->returned_at ?? 'Not Returned' }}</td>
            <td>
                @if($record->returned_at)
                    Returned
                @else
                    Borrowed
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No borrow history</td>
        </tr>
    @endforelse
</table>

<br>
<a href="{{ route('books.index') }}">Back</a>

@endsection