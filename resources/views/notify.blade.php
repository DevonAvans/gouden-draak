@extends('layouts.main')

@section('content')
<h2>Vraag of je geholpen kan worden</h2>
    <form method="POST" action="{{ route('notify.store') }}">
        @csrf
        Selecteer je tafelnummer:<select name="table_id">
            @foreach ($tables as $table)
            <option value="{{ $table->id }}">{{ $table->id }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Vraag hulp</button>
    </form>
@endsection
