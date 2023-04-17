@extends('layouts.base')

@section('title', 'Правка объявления :: Мои объявления')

@section('main')
    <form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="txtTitle">Товар</label>
            <input value="{{ $bb->title }}" name="title" id="txtTitle" class="form-control">
        </div>
        <div class="form-group">
            <label for="txtContent">Описание</label>
            <textarea value="{{ $bb->content }}" name="content" id="txtContent" class="form-control"
                      row="3" ></textarea>
        </div>
        <div class="form-group">
            <label for="txtPrice">Цена</label>
            <input value="{{ $bb->price }}" name="price" id="txtPrice" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Сохранить">
    </form>
@endsection
