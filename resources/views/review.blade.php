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
    
    <select type="subject" name="subject" id="subject"  class="selectpicker dropdown" data-live-search="true">
@foreach($items as $item)
  <option data-tokens="элемент 1">{{ $item->subject }}</option>
@endforeach
</select>
<select type="group" name="group" id="group"  class="selectpicker dropdown" data-live-search="true">
@foreach($groups as $group)
  <option data-tokens="элемент 1">{{ $group->group }}</option>
@endforeach
</select>
    <button type="submit" class="btn btn-success">Отправит</button>
</form>

<h1>Все связи</h1>

@endsection