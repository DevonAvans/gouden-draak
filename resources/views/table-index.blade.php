@extends('layouts.kassa')

@section('content')
<link href="{{ asset('css/tables/tables.css') }}" rel="stylesheet">
<h2>Bind een medewerker aan een tafel</h2>
<a href="{{route('table.clear')}}">Verwijder alle medewerkers</a>
<div class="tablegrid">
    @foreach($tables as $table)
        <div class="table">
            Tafelnummer: {{ $table->id }}<br>
            Plekken: {{ $table->seats }}<br>
            Bijbehorende medewerker: @if (isset($table->user_id))
                {{ $table->user->name }}
            @else
                Niemand
            @endif<br>
            <a href="{{route('table.edit', $table->id)}}">Edit</a>
        </div>
    @endforeach
</div>
@endsection
