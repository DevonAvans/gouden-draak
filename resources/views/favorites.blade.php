@extends('layouts.main')

@section('content')
<link href="{{ asset('css/menu/menu.css') }}" rel="stylesheet">
<h2>Favorieten</h2>
<div class="container">
    @foreach ($dishes as $dish)
        {{ $dish->menu_text }}. {{ $dish->name }} ฿ {{$dish->price}}
        <br>
        @if (isset($dish->spiciness_id))
        {{ $dish->spiciness->description }},
        @else
        Niet gekruid,
        @endif
        @foreach ($dish->allergens as $allergen)
            {{$allergen->description}},
        @endforeach
        <br>
    @endforeach
</div>
<a href="{{route('menu')}}">Terug</a>
@endsection
