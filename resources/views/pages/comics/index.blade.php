@extends('layouts.app')
@section('title-page', 'DC Comics- Home')
@section('main-content')
    <h1>LA LISTA DEI FUMETTI</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Thumb</th>
            <th scope="col">Price</th>
            <th scope="col">Series</th>
            <th scope="col">Sale_date</th>
            <th scope="col">Type</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comics as $elem)
            <tr>
              <th scope="row">{{$elem->id}}</th>
              <td>
                <a href="{{ route('comics.show', $elem->id) }}">
                    {{$elem->title}}
                </a>
            </td>
              <td>{{!!$elem->description!!}}</td>
              <td>
                <img src="{{ $elem->thumb }}" class="card-img-top" alt="...">
              </td>
              <td>{{$elem->price}}</td>
              <td>{{$elem->series}}</td>
              <td>{{$elem->sale_date}}</td>
              <td>{{$elem->type}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>

      {{  $comics->links() }}
@endsection

