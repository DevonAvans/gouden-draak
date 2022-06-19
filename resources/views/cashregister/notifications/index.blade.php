@extends('layouts.kassa')

@section('content')
<h2>Notificaties</h2>
@foreach($notis as $noti)
    <div class="table">
        Notificatienummer: {{ $noti->id }}<br>
        Tafel: {{ $noti->table->id }}<br>
        Tijd van notification: {{$noti->time}}<br>
    </div><br>
@endforeach
@endsection
