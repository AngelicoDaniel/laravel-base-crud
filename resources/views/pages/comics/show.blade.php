@extends('layouts.app')
@section('title-page', 'DC Comics- Show')
@section('main-content')
    <h1>SINGOLO FUMETTO</h1>


    <div class="card m-auto" style="width: 18rem;">
        <img src="{{ $elem->thumb }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $elem->title}}</h5>
        </div>
      </div>
@endsection

