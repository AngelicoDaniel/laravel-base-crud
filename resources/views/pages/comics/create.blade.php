@extends('layouts.app')
@section('title-page')
    DC Comics - Create
@endsection
@section('main-content')
<h1 class="text-center">Form per la Create</h1>

@if ( $errors->any() )
    <div class="alert alert-danger my-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('comics.store')}}">

    @csrf

    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input name="title" type="text" class="form-control" id="title" maxlength="50">
    </div>

    <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <textarea name="description" class="form-control" id=""></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Immagine</label>
        <input name="thumb" type="text" class="form-control" id="title">
    </div>

    <div class="mb-3">
        <label class="form-label">Prezzo</label>
        <input name="price" type="text" class="form-control" id="title">
    </div>

    <div class="mb-3">
        <label class="form-label">Serie</label>
        <input name="series" type="text" class="form-control" id="title">
    </div>

    <div class="mb-3">
        <label class="form-label">Sale_Date</label>
        <input name="sale_date" type="text" class="form-control" id="title">
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <input name="type" type="text" class="form-control" id="title">
    </div>

    <button type="submit" class="btn btn-primary">Crea Comic</button>
</form>
@endsection
