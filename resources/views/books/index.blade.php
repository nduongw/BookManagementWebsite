@extends('layouts.app')

@section('title')
Book Homepage
@endsection

@section('content')
    <h1>List of Book:</h1>
    <a href="/book/create">Add</a>
    <ol>
        @foreach($books as $book)
        <li>Tên: {{$book->tittle}}</li>
        <p> Giá: {{$book->price}} vnđ</p>
        <a href="/book/{{$book->id}}/edit">Edit</a>
        <a href="/book/{{$book->id}}/delete">Delete</a>
        @endforeach
    </ol>
@endsection