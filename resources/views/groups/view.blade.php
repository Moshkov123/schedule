@extends('layout')
@section('main_content')

<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{ $group->group }}</h1>
    </div>
</div>

<div class="album py-5 bg-body-tertiary">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!-- Add your album items here -->
    </div>
</div>

<h1>Предметы</h1>
@foreach($groupItem as $el)
    @if($el->group_id == $group->id) 
       @foreach($index as $item)
            @if($el->item_id == $item->id)
            <div class="alert alert-warning">
            <h1 class="fw-light">{{ $item->subject }}</h1>
            </div>
            @endif
       @endforeach
    @endif
@endforeach

@endsection
