<?php
session_start();
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KlubFC - Logowanie</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="css/login.css">
    <meta name="theme-color" content="#fafafa">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="text-center">
<form class="form-signin login-form">
    <div class="not-found-info"></div>
    <img src="../img/logos/logo_white.png" alt="Klub FC" width="200">
    <h1 class="h3 mb-3 font-weight-normal text-white">Zaloguj się na stronę klubu</h1>
    <label for="inputEmail" class="sr-only">Adres e-mail</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Adres e-mail" required autofocus>
    <label for="inputPassword" class="sr-only">Hasło</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Hasło" required>
    <button class="btn btn-outline-light btn-block" type="submit">Zaloguj się</button>
    <button class="btn btn-outline-light btn-block" type="button">Rejestracja</button>
    <a class="btn btn-outline-light btn-block" href="../index.php" type="button">Powrót do strony głównej</a>
    <p class="mt-3 mb-3 text-white">&copy; 2020</p>
</form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../js/jquery.redirect.js"></script>
<script src="../js/login.js"></script>
</html>
