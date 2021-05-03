@extends('layout')
@section('content')
<section class="section-home container">
      <h2 class="section-title">
        <div class="draw"></div>
        Nike Jordan 1 bleu 
      </h2>
      <div class="types">
        <a href="/catalogue/Nike" style="margin-right: 10px;">Nike 👈</a>
        <a href="/catalogue/Jordan 1 Hight"style="margin-right: 10px;">Jordan 1 Hight👈</a>
        </div>
      <p><b>Sortie:</b> 12/06/21</p>
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
        <a href="/images/1.jpeg" target="_blanck" class="snkr-product col-4 col-sm-6">
          <div
            class="snkr-picture"
            style="
              background: url(/images/1.jpeg);
              background-position: center;
              background-size: cover;
            "
          ></div>
        </a>
         <a href="/images/1.jpeg" target="_blanck"  class="snkr-product col-4 col-sm-6">
          <div
            class="snkr-picture"
            style="
              background: url(/images/1.jpeg);
              background-position: center;
              background-size: cover;
            "
          ></div>
        </a>
         <a href="/images/1.jpeg" target="_blanck"  class="snkr-product col-4 col-sm-6">
          <div
            class="snkr-picture"
            style="
              background: url(/images/1.jpeg);
              background-position: center;
              background-size: cover;
            "
          ></div>
        </a>
         <a href="/images/1.jpeg" target="_blanck"  class="snkr-product col-4 col-sm-6">
          <div
            class="snkr-picture"
            style="
              background: url(/images/1.jpeg);
              background-position: center;
              background-size: cover;
            "
          ></div>
        </a>
    </section>
@endsection