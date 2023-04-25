@extends('layouts.base')

@section('title', $bb->title)

@section('main')
    <h2>{{ $bb->title }}</h2>
    <p>{{ $bb->description }}</p>
    <p>{{ $bb->price }} руб.</p>
    <p>Автор: {{ $bb->user->name }}</p>
    <p><a href="{{ route('index') }}">На главную</a></p>
@endsection
