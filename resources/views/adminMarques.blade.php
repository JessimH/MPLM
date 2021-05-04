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
                                <td><a  href="/catalogue/{{$marque->name}}">{{$marque->name}}</a></td>
                                <td><a class="text-danger" href="/delete/marque/{{$marque->id}}">supprimer</a></td>
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
