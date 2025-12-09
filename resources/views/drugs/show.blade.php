@extends('layouts.sideBar')

@section('content')
    <div class="dash-con">
        <h2>{{ $drug->name }}</h2>
        <p>Type: {{ $drug->type }}</p>
        <p>Description: {{ $drug->description }}</p>
        <p>Stock: {{ $drug->stock }}</p>
    </div>
@endsection