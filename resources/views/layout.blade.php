<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/style.css" />

    <title>MPLM</title>
  </head>
  <body>
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
                <li><a class="dropdown-item" href="/catalogue/nike">Nikes</a></li>
                <li><a class="dropdown-item" href="/catalogue/nike">Adidas</a></li>
                <li><a class="dropdown-item" href="/catalogue/nike">New Balance</a></li>
                <li><a class="dropdown-item" href="/catalogue/nike">Reebook</a></li>
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

@yield('content')

    <footer class="bg text-center text-lg-start footer">
      <!-- Copyright -->
      <div class="text-center p-3">
        <p>Made with a lot of ❤️</p>
        © 2021 Copyright: MPLM.com, all right reserved
        <ul>
          <li>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
          </li>
          <li>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
          </li>
        </ul>
      </div>
      <!-- Copyright -->
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
