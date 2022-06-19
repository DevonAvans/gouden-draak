@extends('layouts.main')

@section('content')
    <form method="POST" action="{{ route('notify.store') }}">
        @csrf
        <select name="table_id">
            @foreach ($tables as $table)
            <option value="{{ $table->id }}">{{ $table->id }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Vraag hulp</button>
    </form>
@endsection
