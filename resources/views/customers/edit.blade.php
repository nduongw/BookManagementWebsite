@extends('layouts.app')

@section('title')
Edit Customer information
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">Edit customer information</div>
    <div class="card-body">
        <form action="/customer/{{$customer->id}}/update-customer" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="First Name" name = "first_name" value = "{{$customer->first_name}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Last Name" name = "last_name" value = "{{$customer->last_name}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Username" name = "username" value = "{{$customer->username}}">
            </div>
            <!-- <div class="form-group">
                <input type="password" class = "form-control" placeholder="Password" name = "password">
            </div> -->
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Phone" name = "phone" value = "{{$customer->phone}}">
            </div>
            <div class="form-group">
                <textarea name="address" placeholder = "Address" cols="5" rows="5" class = "form-control">{{$customer->address}}</textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection