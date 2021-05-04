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
          <form class="d-flex search">
            <input placeholder="Chercher une SNKRS" aria-label="Search" />
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
        @if($filtre)
            {{$filtre}}
        @else
            {{ count($sneakers) < 2 ? count($sneakers).' paire dans le catalogue' : count($sneakers).' paires dans le catalogue'}}
        @endif
      </h2>
      <div class="row">
      @foreach($sneakers as $sneaker)
        <a href="/sneaker/{{$sneaker->id}}" class="snkr-card col-2 col-sm-6">
            <div
              class="snkr-pic"
              style="
                background: url(/images/{{$sneaker->photo}});
                background-position: center;
                background-size: cover;
              "
            ></div>
            <p class="snkr-nbrPic">{{count(json_decode($sneaker->filenames))}} <i class="far fa-images"></i></p>
            <p class="snkr-title">{{$sneaker->name}}</p>
          </a>
      @endforeach
      </div>
    </section>

@endsection