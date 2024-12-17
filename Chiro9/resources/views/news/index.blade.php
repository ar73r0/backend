@extends('layouts.app')

@section('content')
<h1>Laatste Nieuws</h1>

@foreach ($newsItems as $news)
    <div>
        <h2><a href="{{ route('news.show', $news) }}">{{ $news->title }}</a></h2>
        <p>{{ $news->published_at }}</p>
        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" width="200">
        @endif
    </div>
@endforeach

{{ $newsItems->links() }}
@endsection
