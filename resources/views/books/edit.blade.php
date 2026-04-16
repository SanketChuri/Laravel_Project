<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title:</label><br>
        <input type="text" name="title" value="{{ old('title', $book->title) }}"><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" value="{{ old('author', $book->author) }}"><br><br>

        <label>Genre:</label><br>
        <input type="text" name="genre" value="{{ old('genre', $book->genre) }}"><br><br>

        <label>Published Year:</label><br>
        <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}"><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="{{ old('quantity', $book->quantity) }}"><br><br>

        <button type="submit">Update Book</button>
    </form>

    <br>
    <a href="{{ route('books.index') }}">Back to List</a>
</body>
</html>