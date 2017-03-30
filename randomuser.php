<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Randomuser</title>
    <!-- Bootstrap Style via CDN -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="content container">
    <!-- Bootstrap 4 Navbar -->
    <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" href="index.html"><img src="imgs/tgm_logo.png" alt="tgm-logo"></a>
        <button class="navbar-toggler hidden-sm-up pull-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
            &#9776
        </button>
        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
            <div class="m-t-3 hidden-sm-up"></div>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="map.html">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="weather.html">Wetter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="guestbook.php">Gästebuch</a>
                </li>
                <li class="nav-item pull-md-right">
                    <a class="nav-link" href="randomuser.php">Randomuser<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="seminars.php">Seminare</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="imprint.html">Impressum</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Header -->
    <header class="m-y-2">
        <h2>Randomuser</h2>
    </header>
    <!-- Divider -->
    <hr class="m-b-2">
</div>
<!-- Footer -->
<footer class="container footer bg-faded text-justify text-xs-center">
    <small>Markus Reichl Wexstraße 19-21 1200 Wien mreichl@student.tgm.ac.at</small>
</footer>
<!-- JQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Tether -->
<script src="bower_components/tether/dist/js/tether.min.js"></script>
<!-- Bootstrap -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>