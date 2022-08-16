<?php
session_start();
error_reporting(0);
include_once('../functions/functions.php');
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!-- Connection established -->';
}
//showMem();
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$validateUname = ($uname != NULL) ? true : false;
$validatePwd = ($pwd != NULL) ? true : false;

//showMem();
if ($_SESSION['auth'] == 'yes') {
    $validate = true;
} else if ($validatePwd && $validateUname) {
    $validate = validate($dbConnect, $uname, $pwd);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="pages-container">
        <div class="pages-logo">
            <a href="../index.php"><img src="../images/logo.svg" class="logo" alt="Stranger Things Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </nav>
        <div class="logout">
            <p><a href="../index.php?logout=logout">Logout</a></p>
        </div>
        <div class="pages-main">
            <?php
            if ($validate) {
                echo '<h2>';
                echo 'Welcome ' . ' - ' . $uname . '!' . '<br>';
                echo '</h2>';
                echo '
                <h3>Reviews</h3><hr>
                <br>
                <form action="add.php" method="post">
                    <input type="text" name="name" placeholder="Enter Season and Episode"><br><br>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                    <input type="hidden" name="userId" value="' . $_SESSION['id'] . '"><br>
                    <input type="submit" value="Add Review">
                </form>
                <br>
                <h3>Edit Reviews</h3><hr>
                <br>
                ';
                listReviews($dbConnect, $_SESSION['id']);
                echo '<br><h3>Delete Reviews</h3><hr><br>';
                deleteReviews($dbConnect, $_SESSION['id']);
            } else {
                echo '<p><a href="../index.php">Return</a></p> ';
            }
            ?>
        </div>
    </div>
</body>

</html>