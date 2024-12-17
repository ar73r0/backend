@extends('layouts.app')

@section('content')
<h1>{{ $news->title }}</h1>
<p>Gepubliceerd op: {{ $news->published_at}}</p>
@if ($news->image)
    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" width="400">
@endif
<p>{{ $news->content }}</p>
@endsection
