@extends('layouts.main')

@section('content')
<link href="{{ asset('css/menu/menu.css') }}" rel="stylesheet">
<h2>Menukaart</h2>
<div class="container">
    <form method="GET">
        <div class="input-group mb-3">
          <input
            type="text"
            name="search"
            value="{{ request()->get('search') }}"
            class="form-control"
            placeholder="Search..."
            aria-label="Search"
            aria-describedby="button-addon2">
          <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
    <a href="{{route('pdf')}}" target="_blank">Download PDF</a>
    <a href="{{route('favorites')}}">Favorieten</a>
    @if(auth()->user() != null)
        @if (auth()->user()->role_id == 1)
            <a href="{{route('menu.create')}}">Maak gerecht</a>
        @endif
    @endif<br>
    <div class="menulist">
        @foreach ($categories as $cat)
            <div class="griditem">
                {{$cat->name}}<br>
                @foreach ($dishes as $dish)
                    @if ($dish->category->id == $cat->id)
                        {{ $dish->menu_text }}. {{ $dish->name }} ฿ {{$dish->price}}
                        <a href="{{route('menu.favorite', $dish->id)}}">Favorite</a>
                        @if(auth()->user() != null)
                            @if (auth()->user()->role_id == 1)
                                <a href="{{route('menu.edit', $dish->id)}}">Edit</a>
                            @endif
                        @endif
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
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>
@endsection
