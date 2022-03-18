@extends('layouts.app')

@section('content')
<h1>Добавить категорию</h1>
<div class="container-admin">
    @include('admin.nav')
    <div class="container-page">
        @if (session()->has('addCategories'))
            <div class="alert alert-success text-center">
                Категория успешно добавлена!
            </div>
        @endif
        <form method="post" action="{{ route('admin.addCategories') }}" enctype="multipart/form-data">
            @csrf
            <label class="form-label">Имя</label>
            <div class="mb-3">
                <input class="form-control" type="text" name="name" value="">
            </div>
            <label class="form-label">Описание</label>
            <div class="mb-3">
                <input class="form-control" type="text" name="description" value="">
            </div>
            <label for="picture" class="form-label">Добавить изображение:</label>
            <div class="mb-3">
                <input id="picture" class="form-control" name="picture" type="file">
            </div>
            <button type="submit" class="btn btn-primary">Добавить категорию</button>
        </form>
    </div>
</div>
@endsection