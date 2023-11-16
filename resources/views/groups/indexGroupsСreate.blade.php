@extends('layout')

@section('titel')Отзывы@endsection

@section('main_content')
<h1>Добавить группу</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/groups/indexGroupsСreate/check">
    @csrf
    <input type="groups" name="groups" id="groups" placeholder="введите группу" class="form-control">
    <button type="submit" class="btn btn-success">Отправит</button>
</form>

<h1>Все группы</h1>
@foreach($group as $el)
    <div class="alert alert-warning">
        <b>{{ $el->group }}</b>
        <a href="{{ route('edit', $el->id) }}" class="btn btn-success">Редактировать</a>
        <a href="{{ route('view', $el->id) }}" class="btn btn-success">Посмотреть расписание группы</a>
        <form action="{{ route('create.delete', ['id' => $el->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endforeach

@endsection