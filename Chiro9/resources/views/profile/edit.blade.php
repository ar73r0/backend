@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bewerk Je Profiel</h1>

        <form action="{{ route('profile.update', auth()->user()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <!-- Naam -->
            <div class="mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}" required>
            </div>

            <!-- E-mail -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" required>
            </div>

            <!-- Wachtwoord -->
            <div class="mb-3">
                <label for="password" class="form-label">Nieuw Wachtwoord</label>
                <input type="password" class="form-control" name="password" placeholder="Laat beide wachtwoord-velden leeg om niet te wijzigen">
            </div>

            <!-- Wachtwoord Bevestigen -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Bevestig Wachtwoord</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Laat beide wachtwoord-velden leeg om niet te wijzigen">
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="{{ old('username', auth()->user()->username) }}">
            </div>

            <!-- Verjaardag -->
            <div class="mb-3">
                <label for="birthday" class="form-label">Verjaardag</label>
                <input type="date" class="form-control" name="birthday" value="{{ old('birthday', auth()->user()->birthday) }}">
            </div>

            <!-- Over Mij -->
            <div class="mb-3">
                <label for="about_me" class="form-label">Over Mij</label>
                <textarea class="form-control" name="about_me">{{ old('about_me', auth()->user()->about_me) }}</textarea>
            </div>

            <!-- Profielfoto -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profielfoto</label>
                <input type="file" class="form-control" name="profile_picture">
                @if(auth()->user()->profile_picture)
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Profiel</button>
        </form>
    </div>
@endsection
