@extends('layouts.sideBar')

@section('content')
    <div class="dash-con">
<form action="{{ route('drugs.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Drug Name">
    <input type="text" name="type" placeholder="Type">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="number" name="stock" placeholder="Stock">
    <button type="submit">Add Drug</button>
</form>
    </div>
@endsection
