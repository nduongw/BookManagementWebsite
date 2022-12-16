@extends('layouts.app')

@section('title')
Publisher Homepage
@endsection

@section('content')
    <h1>List of Publisher:</h1>
    <a href="/publisher/create">Add</a>
    <ol>
        @foreach($publishers as $publisher)
        <li>Tên: {{$publisher->name}}</li>
        <a href="/publisher/{{$publisher->id}}/edit">Edit</a>
        <a href="/publisher/{{$publisher->id}}/delete">Delete</a>
        @endforeach
    </ol>
@endsection