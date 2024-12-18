@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Laatste Nieuws</h2>
    <div class="row">
        @foreach ($newsItems as $news)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">
                            {{ Str::limit($news->content, 100, '...') }}
                        </p>
                        <p class="text-muted">
                            Gepubliceerd op: {{ $news->published_at }}
                        </p>
                        <a href="{{ route('news.show', $news) }}" class="btn btn-primary">Lees meer</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
