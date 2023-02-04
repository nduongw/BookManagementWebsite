<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Display all Books</h1>

    <!-- {{ $books }} -->
    @foreach  ($books as $book)
    <li>{{$book->created_date}}</li>
    @endforeach
</body>
</html>