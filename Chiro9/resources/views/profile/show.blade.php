@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->username }}'s Profile</h1>
        
        <!-- Display the profile picture if exists -->
        @if ($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="rounded-circle" width="150">
        @else
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="rounded-circle" width="150">
        @endif
        
        <p><strong>Birthday:</strong> {{ $user->birthday ?? 'Niet opgegeven' }}</p>
        <p><strong>About Me:</strong> {{ $user->about_me ?? 'Geen informatie beschikbaar' }}</p>

        <!-- Link to the edit page for logged-in user -->
        @auth
            @if(auth()->user()->id == $user->id)
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            @endif
        @endauth
    </div>
@endsection
