@extends('layout')
@section('content')
<section class="section-home container">
      <h2 class="section-title">
        <div class="draw"></div>
        {{$sneaker -> name}}
      </h2>
      <div class="types">
        <a href="/catalogue/Nike" style="margin-right: 10px;">{{$sneaker->marques->name}} 👈</a>
        <a href="/catalogue/Jordan 1 Hight"style="margin-right: 10px;">{{$sneaker->modeles->name}}👈</a>
        </div>
      <p><b>Ajouté le:</b> {{\Carbon\Carbon::parse($sneaker -> created_at)->format('d/m/Y')}}</p>
        <form action="POST" action="/sneaker/color">
        {{ csrf_field() }}
            <div class="input-group mb-3">
            <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected>Choisissez un coloris</option>
                <option value="1">Legend blue</option>
                <option value="2">Black</option>
                <option value="3">Full White</option>
            </select>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
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