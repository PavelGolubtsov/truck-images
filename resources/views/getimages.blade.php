@extends('layouts.app')

@section('content')
<h1>Изображения</h1>
<div class="container-page">
    @foreach ($images as $image)
        <div class="container-left">
            <div>
                {{$image->name}}
            </div>
            <div>
                {{$image->description}}
            </div>
            <div>
                <img
                    style="height:60px;width:80px;"
                    src="{{asset('storage/img/images/')}}/{{$image->picture}}"
                >
            </div>
        </div>
    @endforeach
</div>
@endsection