@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        <a href="/dashboard" type="button">Retour a l'accueil</a>
            <div class="card">
                <div class="card-header"><h3>Marque</h3></div>
                <div class="card-body">
                <form action="/add/marque" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group"> 
                        <label for="name">Nom de la marque</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nike">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
