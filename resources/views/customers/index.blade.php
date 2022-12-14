@extends('layouts.app')

@section('title')
User Homepage
@endsection

@section('content')
    <h1>List of Customer:</h1>
    <a href="customer/create">Add</a>
    <ol>
        @foreach($customers as $customer)
        <li>Tên: {{$customer->first_name}} {{$customer->last_name}}</li>
        <p>Phone: {{$customer->phone}}</p>
        <p>Địa chỉ: {{$customer->address}}</p>
        <a href="customer/{{$customer->id}}/edit">Edit</a> 
        <a href="customer/{{$customer->id}}/delete">Delete</a> 
        @endforeach
    </ol>
@endsection