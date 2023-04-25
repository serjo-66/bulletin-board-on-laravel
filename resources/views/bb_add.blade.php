@extends('layouts.base')

@section('title', 'Добавление объявления :: Мои объявления')

@section('main')
    <form action="{{ route('bb.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtTitle">Товар</label>
            <input value="{{ old('title') }}" name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="txtDescription">Описание</label>
            <textarea name="description" id="txtDescription"
                      class="form-control @error('description') is-invalid @enderror"
                      row="3">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="txtPrice">Цена</label>
            <input value="{{ old('price') }}" name="price" id="txtPrice" class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection
