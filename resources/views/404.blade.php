@extends('layout')
@section('content')

<nav class="navbar navbar-expand-lg navbar bg nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">MPLM</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon">
            <i class="fa fa-align-justify" title="Align Justify"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/"
                >Accueil</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/catalogue">Catalogue</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="color: white"
              >
                Marques
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach($marques as $marque)
                  <li><a class="dropdown-item" href="/catalogue/{{$marque->name}}">{{$marque->name}}</a></li>
                @endforeach
              </ul>
            </li>
          </ul>
          <form method="POST" action="/search" class="d-flex search">
          {{ csrf_field() }}
            <input class="typeahead" name="search" id="search" placeholder="Chercher une SNKRS" type="text" />
            <button type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
</nav>

@include('flash-message') 

    <section style="width: 100vw; height: 70vh; display: flex; justify-content: center; align-items:center; background: url('https://i.gifer.com/17ZQ.gif'); color: white">
        <h1 style="font-size: 3em;">Désolé, aucune Sneaker trouvé!</h1>
    </section>
@endsection

   