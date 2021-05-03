@extends('layout')
@section('content')
@include('flash-message') 

    <section class="section-home container">
      <h2 class="section-title">
        <div class="draw"></div>
        Nos dernières paires
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

   