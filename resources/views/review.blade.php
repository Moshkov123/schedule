@extends('layout')

@section('titel')Отзывы@endsection

@section('main_content')
<h1>Form</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/review/check">
    @csrf
    <input type="subject" name="subject" id="subject" placeholder="введите предмет" class="form-control">
    <input type="group" name="group" id="group" placeholder="введите группу" class="form-control">
    <button type="submit" class="btn btn-success">Отправит</button>
</form>

<h1>Все отзывы</h1>
 @foreach($reviews as $el)
    <div class="alert alert-warning">
    <h3>{{ $el->subject }}</h3>
    <b>{{ $el->group }}</b>
    </div>
 @endforeach
@endsection