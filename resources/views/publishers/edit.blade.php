@extends('layouts.app')

@section('title')
    Edit publisher
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">Edit publisher</div>
    <div class="card-body">
        <form action="/publisher/{{$publisher->id}}/update-publisher" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Name" name = "name" value = "{{$publisher->name}}">
            </div>
            
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection