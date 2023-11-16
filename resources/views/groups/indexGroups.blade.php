@extends('layout')
@section('main_content')

<div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>

<div class="album py-5 bg-body-tertiary">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    
</div>
</div>
<h1>Группы</h1>
@foreach($group as $el)
 
 <div class="col">
       <div class="card shadow-sm">
         <div class="card-body bg-warning">
           <p class="card-text">{{ $el->group }}</p>
           <a href="{{ route('view', $el->id) }}" class="btn btn-success">Посмотреть расписание группы</a>
           <div class="d-flex justify-content-between align-items-center">
           </div>
         </div>
       </div>
     </div>


@endforeach
@endsection