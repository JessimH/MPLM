@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <div class="col col-12">
        @include('flash-message')
        <div class="col col-12">
            <div class="card">
                <div class="card-header"><h3>Modèles</h3></div>
                <div class="card-body">
                <a href="/add/modele" type="button" class="btn btn-primary btn-lg mb-3">Ajouter un nouveau modèle</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($modeles as $modele)
                            <tr>
                                <th scope="row">{{$modele->id}}</th>
                                <td><a href="/catalogue/{{$modele->name}}">{{$modele->name}}</a></td>
                                <td><a href="/catalogue/{{$modele->marques->name}}">{{$modele->marques->name}}</a></td>
                                <td><a class="text-danger" href="/delete/modele/{{$modele->id}}">supprimer</a></td>
                                </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
