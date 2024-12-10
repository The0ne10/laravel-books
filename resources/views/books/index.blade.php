<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Книги</title>
</head>
<body>
<h1>Список книг</h1>

<form method="GET" action="{{ route('books.index') }}">
    <label for="author_id">Фильтр по автору:</label>
    <select name="author_id" id="author_id">
        <option value="">Все</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}" {{ $authorId == $author->id ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Фильтровать</button>
</form>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>Название книги</th>
        <th>Авторы</th>
        <th>Количество авторов</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->authors->pluck('name')->join(', ') }}</td>
            <td>{{ $book->authors->count() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
