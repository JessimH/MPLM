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
              <a class="nav-link" aria-current="page" href="/"
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

<section class="section-home container">
      <h2 class="section-title">
        <div class="draw"></div>
        {{$sneaker -> name}}
      </h2>
      <div class="types">
        <a href="/catalogue/{{$sneaker->marques->name}}" style="margin-right: 10px;">{{$sneaker->marques->name}}</a>
        <a href="/catalogue/{{$sneaker->modeles->name}}"style="margin-right: 10px;">{{$sneaker->modeles->name}}</a>
        </div>
      <p style="margin-left: 5vw;"><b>Ajouté le:</b> {{\Carbon\Carbon::parse($sneaker -> created_at)->format('d/m/Y')}}</p>
        <form style="margin-left: 5vw;" method="POST" action="/sneaker/{{$sneaker->modeles->name}}/color">
        {{ csrf_field() }}
            <div class="input-group mb-3">
            <select class="custom-select" id="color" name="color">
                <option>{{$sneaker->color}}</option>
                @foreach($colors as $color)
                  <option>{{$color}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary">Voir</button>
            </div>
        </form>
      </div>
      <div class="row products">
        @foreach ($images as $image)
          <a href="/images/{{$image}}" target="_blanck" class="snkr-product col-4 col-sm-6">
            <div
              class="snkr-picture"
              style="
                background: url(/images/{{$image}});
                background-position: center;
                background-size: cover;
              "
            ></div>
          </a>
        @endforeach
    </section>
@endsection