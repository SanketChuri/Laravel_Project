@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-semibold mb-6">Book Details</h2>

<!-- Book Info Card -->
<div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-6">
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Genre:</strong> {{ $book->genre }}</p>
    <p><strong>Published Year:</strong> {{ $book->published_year }}</p>
    <p><strong>Available Quantity:</strong> {{ $book->quantity }}</p>
</div>

<hr class="mb-6">

<h3 class="text-xl font-semibold mb-4">Borrow History</h3>

<div class="overflow-x-auto">
    <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Borrower</th>
                <th class="p-3 text-left">Borrowed At</th>
                <th class="p-3 text-left">Returned At</th>
                <th class="p-3 text-left">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($book->borrowRecords as $record)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-medium">{{ $record->borrower_name }}</td>

                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($record->borrowed_at)->format('d M Y, H:i') }}
                    </td>

                    <td class="p-3">
                        {{ $record->returned_at 
                            ? \Carbon\Carbon::parse($record->returned_at)->format('d M Y, H:i') 
                            : '—' }}
                    </td>

                    <td class="p-3">
                        @if($record->returned_at)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                                Returned
                            </span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-sm">
                                Borrowed
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-500">
                        No borrow history
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    <a href="{{ route('books.index') }}"
       class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">
        ← Back to List
    </a>
</div>

@endsection