@extends('layouts.app')

@section('title')
    Create new publisher
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">Create new publisher</div>
    <div class="card-body">
        <form action="/store-publishers" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Name" name = "name" value = "{{old('name')}}">
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection