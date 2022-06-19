@extends('layouts.main')

@section('content')
<a href="{{route('table.clear')}}">Verwijder alle medewerkers</a>
<table class="table table-bordered data-table">
    <thead>
        <tr>
            <th>Nummer</th>
            <th>Seats</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tables as $table)
        <tr>
            <td>{{ $table->id }}</td>
            <td>{{ $table->seats }}</td>
            <td>@if (isset($table->user_id))
                {{ $table->user->name }}
            @else
                Geen medewerker
            @endif</td>
            <td><a href="{{route('table.edit', $table->id)}}">Edit</a></th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
