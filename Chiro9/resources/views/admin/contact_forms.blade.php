@extends('layouts.app')

@section('content')
<div class="container">
    <h3  class="d-flex justify-content-around">Overzicht van Contactformulieren</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Bericht</th>
                <th>Datum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactForms as $form)
            <tr>
                <td>{{ $form->name }}</td>
                <td>{{ $form->email }}</td>
                <td>{{ $form->message }}</td>
                <td>{{ $form->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection