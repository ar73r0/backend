
@extends('layouts.app')
@section('content')

    

    
    <div class="container mt-5" >
        <div class="text-center">
            <h1>Welkom bij Chiro9</h1>
        </div>

        @auth
            @if (auth()->check() && auth()->user())
            <div class="row mt-4">
            <div class="container">
    <h1>Tent Overview</h1>
    <div class="row">
        @foreach ($tents as $tent)
            <div class="col-md-4">
                <div class="card mb-4">
                    @if ($tent->image)
                        <img src="{{ asset('storage/' . $tent->image) }}" class="card-img-top" alt="{{ $tent->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $tent->name }}</h5>
                        <p class="card-text">{{ Str::limit($tent->description, 100) }}</p>
                        <p><strong>Capacity:</strong> {{ $tent->capacity }} people</p>
                        <p><strong>Price:</strong> €{{ $tent->price }}</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $tents->links() }} <!-- Pagination links -->
</div>
            </div>
            @endif  
        @endauth

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Nieuws</h5>
                        <p class="card-text">Bekijk het laatste nieuws en blijf op de hoogte!</p>
                        <a href="{{ route('news.index') }}" class="btn btn-primary">Ga naar Nieuws</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">FAQ</h5>
                        <p class="card-text">Heb je vragen? Kijk hier voor antwoorden.</p>
                        <a href="{{ route('faq') }}" class="btn btn-primary">Bekijk FAQ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Contact</h5>
                        <p class="card-text">Neem contact op met ons team.</p>
                        <a href="{{ route('contact') }}" class="btn btn-primary">Contacteer ons</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
