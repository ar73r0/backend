@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4 text-center">Edit Nieuwsbericht</h3>

    <form method="POST" action="{{ route('news.update', $newsItem->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-group ">
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" value="{{ old('title', $newsItem->title) }}" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $newsItem->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Current Image" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
    </form>
</div>
    
@endsection
