<?php
    session_start();
    error_reporting(0);
    include_once('../functions/functions.php');

    $dbconnect = dbLink();
    //if ($dbconnect) echo 'Connection Established'; 
?>

<!DOCTYPE html>
    <html lang="en">
     <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stranger Things - Seasons</title>
    <link rel="stylesheet" href="../css/style.css">
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&display=swap" rel="stylesheet"> 
  </head>
      <div class="grid-container">
    <body>
        <div class="logo">
        <a href="../index.php"><img src="../images/logo.svg" class="logo" alt="Stranger Things Logo">
        </div>
        <nav>
        <ul>
        <li><a href="#">About</a></li>
        <li><a href="seasons.php">Seasons</a></li>
        <li><a href="#">Shop</a></li>
        </ul>
        </nav>
        <div class="form-container">
        <form role="search" id="form">
          <input
            type="search"
            id="query"
            name="q"
            placeholder=""
            aria-label="Search through site content"
          />
          <button>
            <svg viewBox="0 0 1024 1024">
              <path
                class="path1"
                d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"
              ></path>
            </svg>
          </button>
        </form>
        </div>
        <div class="seasons">
          <div class="seasons-content">
          <?php
            listSeasons($dbconnect);
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
    </body>
</html>