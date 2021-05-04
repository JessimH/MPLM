@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        <a href="/dashboard" type="button">Retour a l'accueil</a>
            <div class="card">
                <div class="card-header"><h3>Modèles</h3></div>
                <div class="card-body">
                <form action="/add/modele" method="POST">
                {{ csrf_field() }}
                  <div class="form-group"> 
                    <label for="name">Nom du modèle</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Air Jordan 11 retro Low">
                    @error('name')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="marque">Marques</label>
                    <select class="form-control" name="marque" id="marque">
                      @foreach($marques as $marque)
                        <option>{{$marque->id}}: {{$marque->name}}</option>
                      @endforeach
                    </select>
                    @error('marque')
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
