@extends('layouts.base')

@section('title', 'Удаление объявления :: Мои объявления')

@section('main')
    <h2>{{ $bb->title }}</h2>
    <p>{{ $bb->description }}</p>
    <p>{{ $bb->price }} руб.</p>
    <p>Автор: {{ $bb->user->name }}</p>
    <form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="удалить">
    </form>
    <p><a href="{{ route('index') }}">На главную</a></p>
@endsection
