@extends('layouts.app')

    @section('content')
    <div class="container mt-4">
        <h1 class="d-flex justify-content-around">Admin Dashboard</h1>
        <div class="d-flex justify-content-around mt-5">
            <!-- Knop voor gebruikersbeheer -->
            <a href="{{ route('admin.users') }}" class="btn btn-primary btn-lg">
                Gebruikers beheren
            </a>

            <!-- Knop voor nieuwsbeheer -->
            <a href="{{ route('admin.news') }}" class="btn btn-primary btn-lg">
                Nieuws beheren
            </a> 

            <a href="{{ route('admin.contact') }}" class="btn btn-primary btn-lg">
                Contact beheren
            </a> 

        </div>
    </div>
    @endsection