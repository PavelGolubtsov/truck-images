@section('styles')
<style>
    .nav-admin{
        width: 300px;
        margin: 0 100px 0 -100px;
        flex: 0 0 auto;
    }
    .nav-admin div{
        margin: 0.5rem 0;
    }
    .nav-admin a{
        border: 1px solid grey;
        background-color: rgb(230, 230, 230);
    }
    .show-i{
        vertical-align: middle;
        border: 1px solid;
        font-size: 10pt;
        border-radius: 20px;
        padding: 0 8px;
        margin: 0 1rem 0 0;
    }
    .show-rarr{
        vertical-align: middle;
        border: 1px solid;
        font-size: 10pt;
        border-radius: 20px;
        padding: 0 3px;
        margin: 0 1rem 0 0;
    }
    .container-admin{
        display: flex;
        justify-content: flex-start;
    }
    .page-admin{
        flex: 0 0 auto;
    }
</style>
@endsection
<div class="nav-admin">
    <div>
        <a class="dropdown-item" href="{{ route('admin.home') }}"><span class="show-i"><b>i</b></span>Главная</a>
    </div>
    <div>
        <a class="dropdown-item" href="{{ route('admin.showCategories') }}"><span class="show-i"><b>i</b></span>Список категорий</a>
    </div>
    <div>
        <a class="dropdown-item" href="{{ route('admin.showUsers') }}"><span class="show-i"><b>i</b></span>Список пользователей</a>
    </div>
    <div>
    <a class="dropdown-item" href="{{ route('admin.categoryCreated') }}"><span class="show-rarr">&rarr;</span>Добавить категорию</a>
    </div>
    <div>
    <a class="dropdown-item" href="{{ route('admin.imageCreated') }}"><span class="show-rarr">&rarr;</span>Добавить изображение</a>
    </div>
</div>