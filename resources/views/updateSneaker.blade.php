@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        <a href="/admin/sneakers" type="button">Retour a la liste des sneakers</a>
            <div class="card">
                <div class="card-header"><h3>{{$sneaker->name}}</h3></div>
                <div class="card-body">
                <form action="/update/sneaker/{{$sneaker->id}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group"> 
                    <label for="name">Nom de la sneaker</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Jordan 11 retro Low Legend Blue"
                    value="{{$sneaker->name}}"
                    >
                    @error('name')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="modele">Modèle</label>
                    <select class="form-control" name="modele" id="modele">
                      @foreach($modeles as $modele)
                        <option>{{$modele->id}}: {{$modele->name}}</option>
                      @endforeach
                    </select>
                    @error('modele')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="marque">Marque</label>
                    <select class="form-control" name="marque" id="marque">
                      @foreach($marques as $marque)
                        <option>{{$marque->id}}: {{$marque->name}}</option>
                      @endforeach
                    </select>
                    @error('marque')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group"> 
                    <label for="color">Couleur ou Vartiation</label>
                    <input type="text" name="color" class="form-control" id="color" placeholder="Legend Blue" value="{{$sneaker->color}}">
                    @error('color')
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
