@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
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
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Jordan retro 11 low</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><a href="">modifier</a></td>
                                <td><a href="">supprimer</a></td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Jacob</td>
                                <td><a href="">modifier</a></td>
                                <td><a href="">supprimer</a></td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>Jacob</td>
                                <td><a href="">modifier</a></td>
                                <td><a href="">supprimer</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="col col-12">
            <div class="card">
                <div class="card-header"><h3>Modèles</h3></div>
                <div class="card-body">
                <a href="" type="button" class="btn btn-primary btn-lg mb-3">Ajouter une sneaker</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jordan retro 11 low</td>
                            <td>Nike</td>
                            <td><a href="">modifier</a></td>
                            <td><a href="">supprimer</a></td>
                        </tr>
                        <tr>
                        <th scope="row">1</th>
                            <td>Jordan retro 11 low</td>
                            <td>Nike</td>
                            <td><a href="">modifier</a></td>
                            <td><a href="">supprimer</a></td>
                        </tr>
                        <tr>
                        <th scope="row">1</th>
                            <td>Jordan retro 11 low</td>
                            <td>Nike</td>
                            <td><a href="">modifier</a></td>
                            <td><a href="">supprimer</a></td>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col col-12">
            <div class="card">
                <div class="card-header"><h3>Marques</h3></div>
                <div class="card-body">
                <a href="#" type="button" class="btn btn-primary btn-lg mb-3">Ajouter une marque</a>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Nike</td>
                            <td><a href="">supprimer</a></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Nike</td>
                            <td><a href="">supprimer</a></td>
                        </tr>
                        <tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Nike</td>
                            <td><a href="">supprimer</a></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
