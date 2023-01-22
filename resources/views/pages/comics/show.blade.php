@extends('layouts.app')
@section('title-page')
    DC Comics - {{$elem->title}}
@endsection
@section('main-content')
    <h1>SINGOLO FUMETTO</h1>
    @if (session('success') )
    <div class="alert alert-success my-3">
        {{ session('success') }}
    </div>
    @endif

    <div class="card m-auto" style="width: 18rem;">
        <img src="{{ $elem->thumb }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $elem->title}}</h5>
          <p>{{!!$elem->description!!}}</p>
        </div>
      </div>
@endsection

