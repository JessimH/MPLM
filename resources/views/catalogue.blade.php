@extends('layout')
@section('content')
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
      @for ($i = 0; $i < 6; $i++)
        <a href="/sneaker/{{$sneakers[$i]['id']}}" class="snkr-card col-2 col-sm-6">
            <div
              class="snkr-pic"
              style="
                background: url(/images/{{$sneakers[$i]['photo']}});
                background-position: center;
                background-size: cover;
              "
            ></div>
            <p class="snkr-nbrPic">{{count(json_decode($sneakers[$i]['filenames']))}} <i class="far fa-images"></i></p>
            <p class="snkr-title">{{$sneakers[$i]['name']}}</p>
          </a>
      @endfor
      </div>
     
     @if(count($sneakers) > 5)
      <div class="row">
      @for ($i = 6; $i < 12; $i++)
        @if($sneakers[$i])
          <a href="/sneaker/{{$sneakers[$i]['id']}}" class="snkr-card col-2 col-sm-6">
              <div
                class="snkr-pic"
                style="
                  background: url(/images/{{$sneakers[$i]['photo']}});
                  background-position: center;
                  background-size: cover;
                "
              ></div>
              <p class="snkr-nbrPic">{{count(json_decode($sneakers[$i]['filenames']))}} <i class="far fa-images"></i></p>
              <p class="snkr-title">{{$sneakers[$i]['name']}}</p>
            </a>
          @endif
      @endfor
      </div>
      @endif
      @if(count($sneakers) > 11)
      <div class="row">
      @for ($i = 12; $i < 18; $i++)
        @if($sneakers[$i])
          <a href="/sneaker/{{$sneakers[$i]['id']}}" class="snkr-card col-2 col-sm-6">
              <div
                class="snkr-pic"
                style="
                  background: url(/images/{{$sneakers[$i]['photo']}});
                  background-position: center;
                  background-size: cover;
                "
              ></div>
              <p class="snkr-nbrPic">{{count(json_decode($sneakers[$i]['filenames']))}} <i class="far fa-images"></i></p>
              <p class="snkr-title">{{$sneakers[$i]['name']}}</p>
            </a>
          @endif
      @endfor
      </div>
      @endif
      @if(count($sneakers) > 18)
      <div class="row">
      @for ($i = 19; $i < 24; $i++)
        @if($sneakers[$i])
          <a href="/sneaker/{{$sneakers[$i]['id']}}" class="snkr-card col-2 col-sm-6">
              <div
                class="snkr-pic"
                style="
                  background: url(/images/{{$sneakers[$i]['photo']}});
                  background-position: center;
                  background-size: cover;
                "
              ></div>
              <p class="snkr-nbrPic">{{count(json_decode($sneakers[$i]['filenames']))}} <i class="far fa-images"></i></p>
              <p class="snkr-title">{{$sneakers[$i]['name']}}</p>
            </a>
          @endif
      @endfor
      {{ $sneakers->links() }}
      </div>
      @endif
    </section>

@endsection