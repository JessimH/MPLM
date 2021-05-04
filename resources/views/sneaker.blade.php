@extends('layout')
@section('content')
<section class="section-home container">
      <h2 class="section-title">
        <div class="draw"></div>
        {{$sneaker -> name}}
      </h2>
      <div class="types">
        <a href="/catalogue/{{$sneaker->marques->name}}" style="margin-right: 10px;">{{$sneaker->marques->name}} 👈</a>
        <a href="/catalogue/{{$sneaker->modeles->name}}"style="margin-right: 10px;">{{$sneaker->modeles->name}}👈</a>
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