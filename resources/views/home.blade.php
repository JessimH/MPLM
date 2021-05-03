@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        @include('flash-message') 
            <div class="card">
                <div class="card-header"><h3>Marques</h3></div>
                <div class="card-body">
                <a href="/add/marque" type="button" class="btn btn-primary btn-lg mb-3">Ajouter une marque</a>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($marques as $marque)
                            <tr>
                                <th scope="row">{{$marque->id}}</th>
                                <td>{{$marque->name}}</td>
                                <td><a href="/delete/marque/{{$marque->id}}">supprimer</a></td>
                                </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div> 
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
                                <td>{{$modele->name}}</td>
                                <th scope="col">{{$modele->marques->name}}</th>
                                <td><a href="/delete/modele/{{$modele->id}}">supprimer</a></td>
                                </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col col-12">
            <div class="card">
                <div class="card-header"><h3>Sneakers</h3></div>
                <div class="card-body">
                <a href="/add/sneaker" type="button" class="btn btn-primary btn-lg mb-3">Ajouter une sneaker</a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Couleur</th>
                            <th scope="col">Modèle</th>
                            <th scope="col">Marque</th>
                            <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sneakers as $sneaker)
                            <tr>
                                <th scope="row">{{$sneaker->id}}</th>
                                <td>{{$sneaker->name}}</td>
                                <th scope="col">{{$sneaker->color}}</th>
                                <th scope="col">{{$sneaker->modeles->name}}</th>
                                <th scope="col">{{$sneaker->marques->name}}</th>
                                <td><a href="/delete/sneaker/{{$sneaker->id}}">supprimer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
