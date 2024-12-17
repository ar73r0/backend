@extends('layouts.app')

@section('content')
<h1>Nieuwsitem Aanmaken</h1>
<form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Titel</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Afbeelding</label>
        <input type="file" name="image">
    </div>
    <div>
        <label>Content</label>
        <textarea name="content" required></textarea>
    </div>
    <div>
        <label>Publicatiedatum</label>
        <input type="date" name="published_at" required>
    </div>
    <button type="submit">Opslaan</button>
</form>
@endsection
