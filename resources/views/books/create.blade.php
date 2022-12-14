@extends('layouts.app')

@section('title')
    Create new book
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">Create new book</div>
    <div class="card-body">
        <form action="/store-books" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Title" name = "tittle" value = "{{old('tittle')}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Price" name = "price" value = "{{old('price')}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Quantity" name = "quantity" value = "{{old('quantity')}}">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection