<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seminare</title>
    <!-- Bootstrap Style via CDN -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Custom Css -->
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
                <li class="nav-item">
                    <a class="nav-link" href="randomuser.php">Randomuser</a>
                </li>
                <li class="nav-item pull-md-right">
                    <a class="nav-link" href="seminars.php">Seminare<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="imprint.html">Impressum</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="m-y-2">
        <h2>Seminare</h2>
        <h4 class="text-muted">Verwaltung von Seminar Teilnehmern</h4>
    </header>
    <!-- Divider -->
    <hr class="m-b-2">
    <!-- Entries -->
    <main>
        <div class="row">
            <form id="form-save" action="php/modules/save.php" method="get">
                <div class="row col-xs-10">
                    <div class="col-xs-12 col-lg-4 m-b-1 text-lg-center">
                        <div class="col-xs-12 m-r-2">Firstname</div>
                        <input type="text" title="firstname" name="firstname" class="col-lg-12 m-r-2 form-text">
                    </div>

                    <div class="col-xs-12 col-lg-4 m-b-1 text-lg-center">
                        <div class="col-xs-12 m-r-2">Lastname</div>
                        <input type="text" title="lastname" name="lastname" class="col-lg-12 m-r-2 form-text">
                    </div>

                    <div class="col-xs-12 col-lg-4 m-b-1 text-lg-center">
                        <div class="col-xs-12 m-r-2">Seminar</div>
                        <input type="text" title="seminar" name="seminar" class="col-lg-12 m-r-2 form-text">
                    </div>
                </div>

                <div class="col-xs-2 text-xs-center">
                    <br/><input type="submit" class='btn bg-primary'>
                </div>
            </form>
        </div>

        <table class="table m-t-2">
            <tr>
                <th>Seminar</th>
                <th>Teilnehmer</th>
            </tr>
        <?php
        include "php/modules/db_connect.php";

        $stmt_titles = $db->prepare("SELECT seminarid, title FROM seminar");

        if ($stmt_titles->execute()) {
            while ($title = $stmt_titles->fetch()) {
                echo "<tr>";

                $stmt_names = $db->prepare(
                    "SELECT userid, firstname, lastname " .
                    "FROM attendance NATURAL JOIN user NATURAL JOIN seminar " .
                    "WHERE title LIKE \"" . $title["title"] . "\";"
                );
                echo "<td>" . $title["title"] . "</td>";
                echo "<td>";
                echo "<table class='table'>";
                echo "<tr><th>Firstname</th><th>Lastname</th><th></th></tr>";
                if ($stmt_names->execute()) {
                    while ($name = $stmt_names->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $name["firstname"] . "</td>";
                        echo "<td>" . $name["lastname"] . "</td>";
                        echo "<td><a href='php/modules/delete.php?a=" . $title["seminarid"] . "&u=" . $name["userid"] . "' class='btn-block'>Delete</a></td>";
                        echo "</tr>";
                    }
                }

                echo "</table>";
                echo "</td>";
                echo "</tr>";
            }
        }

        $db = null;
        ?>
        </table>
    </main>
</div>
<!-- Footer -->
<footer class="container footer bg-faded text-justify text-xs-center m-t-3">
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
