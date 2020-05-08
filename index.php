<!doctype html>
<html class="no-js" lang="pl">
<head>
  <meta charset="utf-8">
  <title>KlubFC - Strona Główna</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,700&display=swap&subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/main_page.css">
  <meta name="theme-color" content="#fafafa">
</head>

<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="loading">
  <img src="./img/loader/loader.gif" class="loader" alt="Loading..." />
</div>

<div class="container bg-white">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1"></div>
      <div class="col-4 text-center">
        <ul class="d-flex align-items-end pl-0">
          <li class="d-inline-flex"><a class="blog-header-logo text-dark text-uppercase mr-3" href="#">Strona</a></li>
          <li class="d-inline-flex"><a href="index.php"><img class="img img-fluid logo" src="./img/logo.png" /></a></li>
          <li class="d-inline-flex"><a class="blog-header-logo text-dark text-uppercase ml-3" href="#">klubu</a></li>
        </ul>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-primary" href="./admin/login.html">Moje konto</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted menu-link" href="tickets.php">Bilety i karnety</a>
      <a class="p-2 text-muted menu-link" href="events.php">Wydarzenia</a>
      <a class="p-2 text-muted menu-link" href="team.php">Zespół</a>
      <a class="p-2 text-muted menu-link" href="history.php">Historia</a>
      <a class="p-2 text-muted menu-link" href="stadium.php">Stadion</a>
      <a class="p-2 text-muted menu-link" href="sponsors.php">Sponsorzy</a>
      <a class="p-2 text-muted menu-link" href="live.php">Relacje LIVE</a>
    </nav>
  </div>


  <div class="jumbotron p-0 md-5 text-white rounded bg-dark shadow">
    <div class="container-fluid px-0 rounded">
      <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded carousel-club-articles"></div>
        <div class="carousel-controls">
          <a class="carousel-control-prev carousel-control rounded m-1 text-center" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next carousel-control rounded m-1 text-center" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-2">
    <div class="col-md-12">
      <h3 class="mt-4 pb-2 font-weight-light border-bottom">
        Na czasie
      </h3>
    </div>
      <div class="col-md-6 most-popular-article"></div>
      <div class="col-md-6 last-commented-article"></div>
  </div>
</div>
</div>

<main role="main" class="container bg-white mb-4 pb-4">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="mt-4 pb-2 font-weight-light border-bottom">Klubowe aktualności</h3>

      <div class="club-articles"></div>
    </div>

    <aside class="col-md-4 blog-sidebar">
      <div class="p-1 pt-0 mb-3 bg-primary text-light rounded shadow">
        <h4 class="py-3 px-3">Tabela ligowa</h4>
        <table class="table table-borderless league-table text-light">
          <thead class="text-uppercase">
          <tr>
            <th class="font-weight-light">Lp.</th>
            <th class="font-weight-light">Drużyna</th>
            <th class="font-weight-light">Mecz</th>
            <th class="font-weight-light">Punkty</th>
          </tr>
          </thead>
          <tbody class="font-secondary clubs-table">
          </tbody>
        </table>
      </div>

      <div class="mt-4 p-4 rounded shadow bg-secondary text-white nearest-match">
      </div>

      <div class="mt-4 p-4 bg-light shadow rounded">
        <h4>Media społecznościowe</h4>
        <div class="fb-page" data-href="https://www.facebook.com/slaskwroclawpl" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/slaskwroclawpl" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/slaskwroclawpl">WKS Śląsk Wrocław SA</a></blockquote></div>
      </div>
    </aside>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="mt-4 pb-2 font-weight-light border-bottom">
            Sponsorzy klubu
          </h3>
        </div>
      </div>
      <div class="row">
        <div class="owl-carousel owl-theme">
          <div class="item"><img class="img-responsive" src="./img/sponsors/nobleBet.png" /></div>
          <div class="item"><img class="img-responsive" src="./img/sponsors/yoonGroup.png" /></div>
          <div class="item"><img class="img-responsive" src="./img/sponsors/adidas.png" /></div>
          <div class="item"><img class="img-responsive" src="./img/sponsors/radioEska.png" /></div>
          <div class="item"><img class="img-responsive" src="./img/sponsors/vitaSportPl.png" /></div>
        </div>
      </div>
    </div>

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="container-fluid py-5 bg-primary text-white">
  <div class="container">
    <div class="row flex align-items-center">
      <div class="col-4 col-md">
        <img src="./img/logos/logo_white.png" class="img-fluid mx-auto d-block" />
      </div>
      <div class="col-4 col-md">
        <h5>Na skróty</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-white" href="#">Bilety i karnety</a></li>
          <li><a class="text-white" href="#">Wydarzenia</a></li>
          <li><a class="text-white" href="#">Zespół</a></li>
          <li><a class="text-white" href="#">Historia</a></li>
          <li><a class="text-white" href="#">Stadion</a></li>
          <li><a class="text-white" href="#">Sponsorzy</a></li>
          <li><a class="text-white" href="#">Relacje LIVE</a></li>
        </ul>
      </div>
      <div class="col-4 col-md">
        <h5>O stronie</h5>
        <ul class="list-unstyled text-small text-justify">
          <li>Niniejsza strona stanowi witrynę poglądową wykonaną na potrzeby przedmiotu Projektowanie Systemów Internetowych i Mobilnych. Wszystkie zawarte na niej treści (tj. zdjęcia artykułów, dane prawcowników, treści artykułów, zdjęcia sponsorów) zostały pobrane z oficjalnej strony klubu.</li>
        </ul>
      </div>
      <div class="col-4 col-md">
        <h5>Dojazd na stadion</h5>
        <ul class="list-unstyled text-small">
          <li>
            <iframe class="shadow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2503.224162401674!2d16.941604916076027!3d51.14121727957661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470fea8eaae5fd95%3A0xf0cefc8f160c790d!2sStadion%20Wroc%C5%82aw!5e0!3m2!1spl!2spl!4v1587730270178!5m2!1spl!2spl" width="360" height="230" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>




<script src="js/vendor/modernizr-3.8.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v6.0&appId=1884357361881732&autoLogAppEvents=1"></script>
</body>

</html>
