<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gebruikers Beheren</h1>

    <!-- Formulier om nieuwe gebruiker aan te maken -->
    <h3>Nieuwe Gebruiker Aanmaken</h3>
    <form method="POST" action="{{ route('admin.createUser') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Bevestig Wachtwoord</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required>
        </div>
        <div class="mb-3">
            <label for="isAdmin" class="form-label">Is Admin?</label>
            <input type="checkbox" id="isAdmin" name="isAdmin">
        </div>
        <button type="submit" class="btn btn-primary">Aanmaken</button>
    </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif


    <hr>

    <!-- Gebruikerslijst -->
    <h3>Gebruikerslijst</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->isAdmin ? 'Admin' : 'Gebruiker' }}</td>
                <td>
                    @if (!$user->isAdmin)
                    <form method="POST" action="{{ route('admin.makeAdmin', $user->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Maak Admin</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('admin.removeAdmin', $user->id) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Verwijder Admin</button>
                    </form>
                    @endif
                    @if($user->id !== auth()->user()->id) <!-- Don't show delete button for current logged in admin -->
                        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST') <!-- This method is needed for POST requests in forms -->
                            <button type="submit" class="btn btn-danger">Verwijder</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>