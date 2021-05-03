@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        <a href="/dashboard" type="button">Retour a l'accueil</a>
            <div class="card">
                <div class="card-header"><h3>Sneakers</h3></div>
                <div class="card-body">
                <form action="/add/sneaker" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
  <div class="form-group"> 
    <label for="name">Nom de la sneaker</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Jordan 11 retro Low Legend Blue">
  </div>
  <div class="form-group">
    <label for="modele">Modèle</label>
    <select class="form-control" name="modele" id="modele">
      @foreach($modeles as $modele)
        <option>{{$modele->id}}: {{$modele->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="marque">Marque</label>
    <select class="form-control" name="marque" id="marque">
      @foreach($marques as $marque)
        <option>{{$marque->id}}: {{$marque->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group"> 
    <label for="color">Couleur ou Vartiation</label>
    <input type="text" name="color" class="form-control" id="color" placeholder="Legend Blue">
  </div>
  <div class="form-group row">
                <div class="col-md-12">
                <label for="filenames">Ajoutez vos photos (max: 4) :</label>
                <input type="file" id="filenames" name="filenames[]" accept="image/png, image/jpeg" multiple>
                </div>
              </div>
  <button type="submit" class="btn btn-primary">Créer</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
