@extends('layouts.app')

@section('title')
Create new Customer
@endsection

@section('content')
<div class="card card-default">
    <div class="card-header">Create new customer</div>
    <div class="card-body">
        <form action="/store-customers" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="First Name" name = "first_name" value = "{{old('first_name')}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Last Name" name = "last_name" value = "{{old('last_name')}}">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Username" name = "username" value = "{{old('username')}}">
            </div>
            <div class="form-group">
                <input type="password" class = "form-control" placeholder="Password" name = "password">
            </div>
            <div class="form-group">
                <input type="text" class = "form-control" placeholder="Phone" name = "phone" value = "{{old('phone')}}">
            </div>
            <div class="form-group">
                <textarea name="address" placeholder = "Address" cols="5" rows="5" class = "form-control" value = "{{old('address')}}"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection