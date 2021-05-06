@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <div class="col col-12">
        <a href="/admin/marques" type="button">Retour a la liste des marques</a>
            <div class="card">
                <div class="card-header"><h3>{{$marque->name}}</h3></div>
                <div class="card-body">
                <form action="/update/marque/{{$marque->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group"> 
                        <label for="name">Nom de la marque</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nike" value="{{$marque->name}}">
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
