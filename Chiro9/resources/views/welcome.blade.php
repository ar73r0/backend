<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @extends('layouts.app')

    </head>
    @section('content')
                        
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            @if (auth()->check() && auth()->user()->isAdmin)
                                <a
                                    href="{{ route('admin.dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                Admin Dashboard
                                </a>
                            @endif
                            <a
                                href="{{ route('home') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Dashboard
                            </a>    
                        @endauth
                    </nav>
                @endif
            </header>

            
            <div class="container mt-5">
                <div class="text-center">
                    <h1>Welkom bij Chiro9</h1>
                    <p class="lead">Ontdek het laatste nieuws, krijg antwoorden op veelgestelde vragen, of neem contact met ons op!</p>
                </div>

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

            
            <footer class="bg-dark text-white text-center py-3 mt-5">
                &copy; {{ date('Y') }} Chiro9. Alle rechten voorbehouden.
            </footer>
        @endsection('content')
        
</html>
