@extends('layouts.main')

@section('content')
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
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Nummer</th>
                <th>Naam</th>
                <th>Categorie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dishes as $dish)
            <tr>
                <td>{{ $dish->menu_text }}</td>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->category->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
