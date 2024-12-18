@extends('layouts.app')

@section('content')
<div class='container'>
    <h1 class="d-flex justify-content-around">News Creation</h1>
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Titel</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Afbeelding</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Publicatiedatum</label>
            <input type="date" class="form-control" name="published_at" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Opslaan</button>
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

<h3 class="d-flex justify-content-around">Nieuwsitems</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Titel</th>
            <th>Publicatiedatum</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($newsItems as $news)
        <tr>
            <td>{{ $news->title }}</td>
            <td>{{ $news->published_at }}</td>
            <td>
                <!-- Verwijderen knop -->
                <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') <!-- DELETE-methode voor verwijderen -->
                    <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection