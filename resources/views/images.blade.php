@extends('layouts.app')

@section('content')
<h1>Добавить изображение</h1>
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('addImages') }}" enctype="multipart/form-data">
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
                <img
                    style="height:100px;width:200px;margin-bottom: 10px;"
                    src="{{asset('storage/img/images/')}}/noimage.png"
                >
                <br>
            @endif
            <label class="form-label">Имя</label>
            <div class="mb-3">
                <input class="form-control" type="text" name="name" value="">
            </div>
            <label class="form-label">Описание</label>
            <div class="mb-3">
                <input class="form-control" type="text" name="description" value="">
            </div>
            <label for="picture" class="form-label">Добавить изображение:</label>
            <input id="picture" class="form-control" name="picture" type="file" class="@error('picture') is-invalid @enderror">
            @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection