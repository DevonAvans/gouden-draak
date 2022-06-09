@extends('layouts.main')

@section('content')
@foreach($news as $new)
<div class="row">
    <div class="col-md-12">
        <h1>{{ $new->title }}</h1>
        <p>{{ $new->content }}</p>
    </div>
</div>
@endforeach
@endsection