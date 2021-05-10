@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col">
        <div class="col col-12">
        @include('flash-message') 
        <div class="col col-12">
            <div class="card">
                <div class="card-header"><h3>Sneakers du moment</h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Couleur</th>
                                <th scope="col">Modèle</th>
                                <th scope="col">Marque</th>
                                <th scope="col">BestSeller</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sneakers as $sneaker)
                                <tr>
                                    <th scope="row"><img src="{{$sneaker->photo}}" height="70px" alt=""></th>
                                    <td><a href="/sneaker/{{$sneaker->id}}">{{$sneaker->name}}</a></td>
                                    <th scope="col">{{$sneaker->color}}</th>
                                    <th scope="col">
                                    <a href="/catalogue/{{$sneaker->modeles->name}}">{{$sneaker->modeles->name}}</a>
                                    </th>
                                    <th scope="col">
                                    <a href="/catalogue/{{$sneaker->marques->name}}">{{$sneaker->marques->name}}</a>
                                    </th>
                                    <td>
                                        @if($sneaker->bestseller)
                                            <a class="text-danger" href="/addBestseller/{{$sneaker->id}}">
                                            retirer</a>
                                        @else
                                            <a href="/addBestseller/{{$sneaker->id}}">ajouter</a>
                                        @endif
                                    </td>
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
