@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <div class="col col-12">
        @include('flash-message') 
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
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sneakers as $sneaker)
                            <tr>
                                <th scope="row"><img src="/images/{{$sneaker->photo}}" height="70px" alt=""></th>
                                <td><a href="/sneaker/{{$sneaker->id}}">{{$sneaker->name}}</a></td>
                                <th scope="col">{{$sneaker->color}}</th>
                                <th scope="col">
                                <a href="/catalogue/{{$sneaker->modeles->name}}">{{$sneaker->modeles->name}}</a>
                                </th>
                                <th scope="col">
                                <a href="/catalogue/{{$sneaker->marques->name}}">{{$sneaker->marques->name}}</a>
                                </th>
                                <td><a class="text-success" href="/update/sneaker/{{$sneaker->id}}">editer</a></td>
                                <td><a class="text-danger" href="/delete/sneaker/{{$sneaker->id}}">supprimer</a></td>
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
