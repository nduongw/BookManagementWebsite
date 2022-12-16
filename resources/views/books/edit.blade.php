@extends('layouts.app')

@section('title')
    Edit book Information
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">Edit book information</div>
    <div class="card-body">
        <form action="/book/{{$book->id}}/update-book" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Title" name = "tittle" value = "{{$book->tittle}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Price" name = "price" value = "{{$book->price}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Quantity" name = "quantity" value = "{{$book->quantity}}">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection