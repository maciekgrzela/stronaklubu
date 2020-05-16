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

  <title>Slask Wroclaw - Admin</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/manageNarrative.css">

  <!--Datatable-->
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
  <link href="css/createNarrative.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.html"><img src="img/slask_herb.png" width="30"
        height="30" class="d-inline-block align-center" alt=""> Admin panel
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
          <h1 class="h2">Zarządzanie relacjami LIVE</h1>

        </div>


        <div id="content">

          <div class="row">
            <div class="col-sm">
              <form class="narrativeAddForm">
                <h3>Dodaj wpis relacji</h3>

                <div class="form-group">
                  <label for="narrativeItemID">Identyfikator wpisu relacji</label>
                  <input type="text" class="form-control" id="narrativeItemID" aria-describedby="emailHelp" placeholder="ID wpisu relacji" disabled>
                </div>

                <div class="form-group">
                  <label for="narrativeID">Identyfikator relacji</label>
                  <input type="text" class="form-control" id="narrativeID" aria-describedby="emailHelp"
                    placeholder="ID relacji" required disabled>
                </div>

                <div class="form-group">
                  <label for="narrativeItemAuthor">Identyfikator autora</label>
                  <input type="text" class="form-control" id="narrativeItemAuthor" aria-describedby="emailHelp"
                    placeholder="Autor" value="<?php if(isset($_SESSION['user'])){
                echo $_SESSION['user']['worker_ID'];
            } 
            ?>" required disabled>
                </div>

                <label for="chooseType">Wybierz zdarzenie</label>
                  <select class="form-control" id="chooseType">
                    <option>whistle</option>
                    <option>red-card</option>
                    <option>yellow-card</option>
                    <option>corner</option>
                    <option>free-kick</option>
                    <option>penalty</option>
                  </select>

                <label for="narrativeItemContent">Treść wpisu relacji</label>
                <textarea id="narrativeItemContent" class="form-control" rows="12" placeholder="Tutaj umieść treść wpisu realcji"></textarea> 
                
                <label for="narrativeItemDate">Data meczu</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">YYYY-MM-DD</span>
                  </div>
                  <input type="text" class="form-control" id="narrativeItemDate" aria-describedby="basic-addon3" required>
                </div>

                <!-- <button id="btnAddPlayer" type="buttonAddPlayer" class="btn btn-success">Dodaj piłkarza</button> -->
                <button id="btnAddNarrativeItem" class="btn btn-success">Dodaj relację</button>
                <button id="btnEditNarrativeItem" class="btn btn-warning">Edytuj relację</button>
                <button id="btnDeleteNarrativeItem" class="btn btn-danger">Usuń relację</button>
              </form>

              <!-- <button id="btnAddPlayer" type="buttonAddPlayer" class="btn btn-success">Dodaj piłkarza</button> -->

              <!-- <button id="wypelnij" class="btn btn-danger">Wypelnij</button> -->
            </div>


            <div class="right col-sm">
                <div class="narrativesTable">
                    <h3>Realcje LIVE w bazie</h3>
    
                    <table id="narrativesTable" class="display" style="width: 100%;">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Id meczu</th>
                          <th scope="col">Tytuł</th>
                          <th scope="col">Data</th>
                        </tr>
                      </thead>
                      <tbody>
    
                      </tbody>
                    </table>
                  </div>

                <div class="narrativeItemsTable">
                    <h3>Zdarzenia do relacji LIVE</h3>
    
                    <table id="narrativeItemsTable" class="display">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Relacja</th>
                          <th scope="col">Autor</th>
                          <th scope="col">Zdarzenie</th>
                          <th scope="col">Treść wpisu</th>
                          <th scope="col">Data</th>
                        </tr>
                      </thead>
                      <tbody>
    
                    </tbody>
                </table>
              </div>
            </div>
            
          </div>
            
          </div>



        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <!--     <script src="../../assets/js/vendor/popper.min.js"></script>
 -->

  <!--     <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script> -->

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- Graphs -->
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  <!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->

  <!--Datatable-->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  
  <script src="js/manageNarrative.js"></script>
 
</body>

</html>