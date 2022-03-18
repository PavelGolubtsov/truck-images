@extends('layouts.app')

@section('content')
<h1>Добавить изображение</h1>
<div class="container-admin">
    @include('admin.nav')
    <div class="container-page">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('admin.addImages') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                @if (session('fileOriginalName'))
                    <img
                        style="height:100px;width:200px;margin-bottom: 10px;"
                        src="{{asset('storage/img/images/')}}/{{ session('fileOriginalName') }}"
                    >
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @else
                    <img style="height:100px;width:200px;margin-bottom: 10px;"
                        src="{{asset('storage/img/images/')}}/noimage.png">
                    <br>
                @endif
                <label class="form-label">Добавить имя:</label>
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" value="">
                </div>
                <label class="form-label">Добавить описание:</label>
                <div class="mb-3">
                    <input class="form-control" type="text" name="description" value="">
                </div>
                <label for="picture" class="form-label">Добавить изображение:</label>
                <div class="mb-3">
                    <input id="picture" class="form-control" name="picture" type="file" class="@error('picture') is-invalid @enderror">
                </div>
                @error('picture')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-label">Выбрать категорию:</label>
                <div class="mb-3">
                    <select name="category_id">
                        <option disabled>Список категорий</option>
                        @foreach ($selectCategoryId as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>
@endsection