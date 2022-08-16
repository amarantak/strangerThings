<?php
session_start();
error_reporting(0);
include_once('functions/functions.php');
if ($_GET['logout'] == 'logout') {
  session_unset();
  session_destroy();
  session_regenerate_id();
}
$dbconnect = dbLink();
if ($dbconnect) echo '<!-- Connection Established -->';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stranger Things - Home</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&display=swap" rel="stylesheet">
</head>
<div class="grid-container">

  <body>
    <div class="logo">
      <a href="index.php"><img src="images/logo.svg" class="logo" alt="Stranger Things Logo">
    </div>
    <nav>
      <ul>
        <li><a href="#">About</a></li>
        <li><a href="pages/seasons.php">Seasons</a></li>
        <li><a href="#">Shop</a></li>
      </ul>
    </nav>
    <div class="content">
      <form action="pages/dashboard.php" method="post">
        <input type="text" name="uname" placeholder="Enter Username">
        <input type="password" name="pwd" placeholder="Enter Password">
        <input type="submit" value="Login">
      </form>
      <a href="pages/signup.php">
        <button>Create an Account</button>
      </a>
    </div>
    <div class="video-container">
      <iframe src="https://www.youtube.com/embed/-RcPZdihrp4?controls=1&autoplay=1&mute=1&playlist=-RcPZdihrp4&loop=1" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;loop">
      </iframe>
      <div class="video-text">
        <a class="button" href="#">NEW SEASON!</a>
      </div>
    </div>
    <div class="cta2">
      <div class="cta2-content">
        <?php
        listCharacters($dbconnect);
        ?>
      </div>
    </div>
    <footer>
      <div class="footer-content">
        <div class="social">
          <a href="#">
            <em class="fab fa-facebook-f"></em>
            <span class="sr-only">Visit example.com</span>
          </a>

          <a href="#">
            <em class="fab fa-instagram"></em>
            <span class="sr-only">Visit example.com</span>
          </a>

          <a href="#">
            <em class="fab fa-twitter"></em>
            <span class="sr-only">Visit example.com</span>
          </a>
        </div>
        <p>&copy;2022 Stranger Things Fans</p>
      </div>
    </footer>
    <script src="js/script.js"></script>
  </body>

</html>