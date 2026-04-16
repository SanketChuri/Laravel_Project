<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use App\Models\BorrowRecord;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'published_year' => 'nullable|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'published_year' => 'nullable|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function borrow(Request $request, Book $book)
    {
        $request->validate([
            'borrower_name' => 'required|string|max:255',
        ]);

        if ($book->quantity > 0) {
            $book->decrement('quantity');

            BorrowRecord::create([
                'book_id' => $book->id,
                'borrower_name' => $request->borrower_name,
                'borrowed_at' => now(),
            ]);

            return redirect()->route('books.index')
                ->with('success', 'Book borrowed successfully.');
        }

        return redirect()->route('books.index')
            ->with('error', 'Book is out of stock.');
    }

    public function returnBook(Request $request, Book $book)
    {
        $request->validate([
            'borrower_name' => 'required|string|max:255',
        ]);

        $record = BorrowRecord::where('book_id', $book->id)
            ->where('borrower_name', $request->borrower_name)
            ->whereNull('returned_at')
            ->latest()
            ->first();

        if ($record) {
            $record->update([
                'returned_at' => now(),
            ]);

            $book->increment('quantity');

            return redirect()->route('books.index')
                ->with('success', 'Book returned successfully.');
        }

        return redirect()->route('books.index')
            ->with('error', 'No matching borrow record found.');
    }

    
}