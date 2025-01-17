
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacteer ons</h1>
    <p>Neem contact op via het onderstaande formulier:</p>

    <form action="{{ url('/contact') }}" method="POST">
    @csrf
    <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input class="form-control"
                type="text" 
                id="name" 
                name="name" 
                value="{{ Auth::check() ? Auth::user()->name : old('name') }}" 
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control"
                type="email" 
                id="email" 
                name="email" 
                value="{{ Auth::check() ? Auth::user()->email : old('email') }}" 
                required
            >
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Verstuur</button>
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection