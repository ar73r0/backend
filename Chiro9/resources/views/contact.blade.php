@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contacteer ons</h1>
    <p>Neem contact op via het onderstaande formulier:</p>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea class="form-control" id="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Verstuur</button>
    </form>
</div>
@endsection
