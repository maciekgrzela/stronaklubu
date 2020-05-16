<?php
session_start();

if(isset($_POST['user'])) {
    $_SESSION['user'] = $_POST['user'];
}
if(!isset($_SESSION['user'])) {
    header("Location: /login.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Slask Wroclaw - Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php"><img src="img/slask_herb.png" width="30" height="30" class="d-inline-block align-center" alt=""> Admin panel
      </a>

            <?php

            if(isset($_SESSION['user'])) {
              echo '
              <ul class="navbar-nav px-3">
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                BILETY
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="tickets.php">Moje bilety</a>
              </div>
                </li>
              </ul>
              ';

            if (isset($_SESSION['user']['is_staff']) && $_SESSION['user']['is_staff'] == '1') {
              echo '
              <ul class="navbar-nav px-3">
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                PIŁKARZE
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="players.php">Zarządzanie piłkarzami</a>
              </div>
              </li>
              </ul>

              <ul class="navbar-nav px-3">
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                BILETY
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Stadion</a>
                <a class="dropdown-item" href="events.php">Zarządzanie wydarzeniami</a>
                <a class="dropdown-item" href="#">Statystyki</a>
              </div>
              </li>
              </ul>
              ';
          } else if (isset($_SESSION['user']['is_journalist']) && $_SESSION['user']['is_journalist'] == '1') {
            echo '
              <ul class="navbar-nav px-3">
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                ARTYKUŁY
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="articles.php">Zarządzanie artykułami</a>
                <a class="dropdown-item" href="articlesStats.php">Statystyki</a>
              </div>
              </li>
              </ul>

              <ul class="navbar-nav px-3">
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                RELACJE LIVE
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="createNarrative.php">Stwórz relację</a>
                <a class="dropdown-item" href="manageNarrative.php">Przeprowadź relację</a>
              </div>
              </li>
              </ul>
            ';
            } else if (isset($_SESSION['user']['is_executive']) && $_SESSION['user']['is_executive'] == '1') {
              echo '
      <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        PIŁKARZE
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="players.php">Zarządzanie piłkarzami</a>
      </div>
      </li>
      </ul>

      <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        ARTYKUŁY
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="articles.php">Zarządzanie artykułami</a>
        <a class="dropdown-item" href="articlesStats.php">Statystyki</a>
      </div>
      </li>
      </ul>

      <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        RELACJE LIVE
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="createNarrative.php">Stwórz relację</a>
        <a class="dropdown-item" href="manageNarrative.php">Przeprowadź relację</a>
      </div>
      </li>
      </ul>

      <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        BILETY
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Stadion</a>
        <a class="dropdown-item" href="events.php">Zarządzanie wydarzeniami</a>
        <a class="dropdown-item" href="#">Statystyki</a>
      </div>
      </li>
      </ul>

      <ul class="navbar-nav px-3">
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        KLUB
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="achievements.php">Osiągnięcia</a>
        <a class="dropdown-item" href="#">Historia klubu</a>
        <a class="dropdown-item" href="#">Sponsorzy</a>
      </div>
      </li>
      </ul>
              ';
            }
        }
          ?>

      <ul class="navbar-nav px-2">
      <li class="nav-item text-nowrap" id="logout">
        <a class="nav-link" href="./logout/logout.php">Wyloguj</a>
      </li>
    </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <?php

              if(isset($_SESSION['user'])) {
                  echo '<ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                      <span data-feather="home"></span>
                      Strona główna <span class="sr-only">(current)</span>
                    </a>
                  </li>
                </ul>';

                echo '<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Bilety</span>
                <a class="d-flex align-items-center text-muted" href="#">
                </a>
              </h6>
              
              <ul class="nav flex-column">
              <li class="nav-item">
              <a class="nav-link" href="tickets.php">
                <span data-feather="users"></span>
                Moje bilety
              </a>
            </li>
                </ul>';



              if (isset($_SESSION['user']['is_staff']) && $_SESSION['user']['is_staff'] == '1') {
                  echo '
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Piłkarze</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="players.php">
                  <span data-feather="users"></span>
                  Zarządzanie piłkarzami
                </a>
              </li>
              </ul>
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Bilety</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Stadion
                </a>
              </li>
            
            
              <li class="nav-item">
                <a class="nav-link" href="events.php">
                  <span data-feather="file-text"></span>
                  Zarządzanie wydarzeniami
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Statystyki
                </a>
              </li>
            </ul>';
              

          } else if (isset($_SESSION['user']['is_journalist']) && $_SESSION['user']['is_journalist'] == '1') {
              echo '<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Relacje LIVE</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">


              <li class="nav-item">
                <a class="nav-link" href="createNarrative.php">
                  <span data-feather="bar-chart-2"></span>
                  Stwórz relację
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="manageNarrative.php">
                  <span data-feather="bar-chart-2"></span>
                  Przeprowadź relację
                </a>
              </li>
            </ul>';

              echo '

              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Artykuły</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
              </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="articles.php">
                  <span data-feather="file-text"></span>
                  Zarządzanie artykułami
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="articlesStats.php">
                  <span data-feather="edit"></span>
                  Statystyki
                </a>
              </li>
              </ul>';

            } else if (isset($_SESSION['user']['is_executive']) && $_SESSION['user']['is_executive'] == '1') {
              echo '<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Relacje LIVE</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">


              <li class="nav-item">
              <a class="nav-link" href="createNarrative.php">
                  <span data-feather="bar-chart-2"></span>
                  Stwórz relację
                </a>
                <a class="nav-link" href="manageNarrative.php">
                  <span data-feather="bar-chart-2"></span>
                  Przeprowadź relację
                </a>
              </li>
            </ul>


              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Artykuły</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
              </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="articles.php">
                  <span data-feather="file-text"></span>
                  Zarządzanie artykułami
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="articlesStats.php">
                  <span data-feather="edit"></span>
                  Statystyki
                </a>
              </li>
              </ul>
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Piłkarze</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="players.php">
                  <span data-feather="users"></span>
                  Zarządzanie piłkarzami
                </a>
              </li>
              </ul>
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Bilety</span>
              <a class="d-flex align-items-center text-muted" href="#">
              </a>
            </h6>
            <ul class="nav flex-column mb-2">

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Stadion
                </a>
              </li>
            
            
              <li class="nav-item">
                <a class="nav-link" href="events.php">
                  <span data-feather="file-text"></span>
                  Zarządzanie wydarzeniami
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Statystyki
                </a>
              </li>
            </ul>
              
              
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Klub</span>
            <a class="d-flex align-items-center text-muted" href="#">
            </a>
          </h6>


          <ul class="nav flex-column mb-2">

            <li class="nav-item">
              <a class="nav-link" href="achievements.php">
                <span data-feather="layers"></span>
                Osiągnięcia
              </a>
            </li>
          
          
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Historia klubu
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Sponsorzy
              </a>
            </li>
          </ul>';
            }
        }
          ?>
          </div>
        </nav>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"><?php if(isset($_SESSION['user'])) {
                echo "Witaj ".$_SESSION['user']['first_name']. " " . $_SESSION['user']['last_name']. "!";
            } else if (isset($_SESSION['worker'])) {
              echo "Witaj ".$_SESSION['worker']['first_name']. " " .$_SESSION['worker']['last_name']." !";
          }
            ?></h1>
          </div>

    <div class="row">
    <div class="col-sm">
      <form class="myAccount">
            <h3>Moje konto</h3>

            <div class="form-group">
            <label for="firstname">Imię</label>
            <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Imie" value="<?php if(isset($_SESSION['user'])){
                echo $_SESSION['user']['first_name'];
            } 
            ?>">
            </div>

            <div class="form-group">
            <label for="lastName">Nazwisko</label>
            <input type="text" class="form-control" id="lastName" aria-describedby="emailHelp" placeholder="Nazwisko" value="<?php if(isset($_SESSION['user'])){
                echo $_SESSION['user']['last_name'];
            } 
          ?>">
            </div>

            <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Login" value="<?php 
            if(isset($_SESSION['user']['worker_login'])){
                echo $_SESSION['user']['worker_login'];
            } else if (isset($_SESSION['user']['user_login'])) {
              echo $_SESSION['user']['user_login'];
            }
            ?>">
            </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Adres email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="<?php if (isset($_SESSION['user']['mail'])) {
                echo $_SESSION['user']['mail'];
            } else if (isset($_SESSION['user']['email'])) {
              echo $_SESSION['user']['email'];
            } 
            ?>">
            
          </div>

          <label for="basic-url">Data urodzenia</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">YYYY-MM-DD</span>
            </div>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="<?php if(isset($_SESSION['user']['date_of_birth'])){
                echo $_SESSION['user']['date_of_birth'];
            } else if (isset($_SESSION['user']['worker_date_of_birth'])) {
              echo $_SESSION['user']['worker_date_of_birth'];
          }
            ?>">
          </div>
          <button type="submit" class="btn btn-success">Zmień dane</button>
        </form>
    </div>
    <div class="col-sm">
      <form class="editPassword">
          <h3>Zmiana hasła</h3>
          <div class="form-group">
            <label for="exampleInputEmail1">Stare hasło</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stare hasło">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nowe hasło</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nowe hasło">
          </div>
          <button type="submit" class="btn btn-success">Zmień hasło</button>
        </form>
    </div>
  </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>

