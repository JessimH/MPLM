@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        <a href="/dashboard" type="button">Retour a l'accueil</a>
            <div class="card">
                <div class="card-header"><h3>Modèles</h3></div>
                <div class="card-body">
                <form action="/add/modele" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
  <div class="form-group"> 
    <label for="name">Nom du modèle</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Air Jordan 11 retro Low">
  </div>
  <div class="form-group">
    <label for="modele">Marques</label>
    <select class="form-control" name="modele" id="modele">
      <option>Nike</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Créer</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
