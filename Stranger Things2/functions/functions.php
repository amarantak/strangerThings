<?php
function dbLink()
{
    $dbHost = 'localhost';
    $dbUser = 'mri';
    $dbPass = 'password';
    $db = 'strangerthings';
    //  error_reporting(0);
    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $db);

    if ($mysqli->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $mysqli->connect_error;
    }
    return $mysqli;
}
function showMem()
{
    echo '<pre>';
    echo '<h3>Post</h3>';
    print_r($_POST);
    echo '<h3>Get</h3>';
    print_r($_GET);
    echo '<h3>Session</h3>';
    print_r($_SESSION);
    echo '</pre>';
}
function listCharacters($dbConnect)
{
    $sql = "SELECT characterName, description, imageName FROM characters";
    $result = mysqli_query($dbConnect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            $image = $row['imageName'];
            echo '<br><br><img src="images/' . $image . '" alt="' . $image . '" style="width:270px;">';
            echo '<div class="title">';
            echo $row['characterName'];
            echo '<br><br>';
            echo '<a class="button" href="#">See more</a>';
            echo '</div>';
            echo '</div>';
        }
    }
}

function listSeasons($dbConnect)
{
    $sql = "SELECT * FROM episodes";
    $result = mysqli_query($dbConnect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="seasons-cards">';
            $image = $row['imageName'];
            echo '<br><br><img src="../images/' . $image . '" alt="' . $image . '" style="width:320px;">';
            echo '<div class="card-title">';
            echo $row['name'];
            echo '<hr>';
            echo '<br>';
            echo '<h4>Release Date:</h4>';
            echo $row['releaseDate'];
            echo '<h4>Synopsis</h4>';
            echo $row['synopsis'];
            echo '<br><br>';
            echo '<a class="button" href="#">See more</a>';
            echo '</div>';
            echo '</div>';
        }
    }
}
/******************************************************/



function insertUser($dbConnect, $name, $uname, $pwd)
{
    $sql = "INSERT INTO users(id,name,uname,pwd) VALUES 
       (null,'$name','$uname','$pwd')";
    if ($dbConnect->query($sql) == true) {
        echo 'Record added<br>';
    } else {
        echo 'Error: ' . $sql . '<br>' . $dbConnect->error;
    }
    $dbConnect->close();
}


function validate($dbConnect, $uname, $pwd)
{
    $sql = "SELECT * from users";
    $res = mysqli_query($dbConnect, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            if ($row['uname'] == $uname) {
                if ($row['pwd'] == $pwd) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['auth'] = 'yes';
                    return true;
                }
            }
        }
    }
}

function insertReview($dbConnect, $name, $description, $userId)
{
    $sql = "INSERT INTO reviews(id,name,description,userid) VALUES 
(null,'$name','$description','$userId')";
    if ($dbConnect->query($sql) == true) {
        echo 'Record added<br>';
    } else {
        echo 'Error: ' . $sql . '<br>' . $dbConnect->error;
    }
    $dbConnect->close();
}

function listReviews($dbConnect, $uid)
{
    $sql = "SELECT * from reviews";
    $res = mysqli_query($dbConnect, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            if ($row['userId'] == $uid) {
                echo '
                    <form method="post" action="edit.php">
                    <input type="text" name="name" value="' . $row['name'] . '"><br><br>
                    <textarea name="description">' . $row['description'] . '</textarea><br>
                    <input type="hidden" name="reviewId" value="' . $row['id'] . '">
                    <input type="submit" value="Edit Entry">
                    </form>
                    ';
            }
        }
    }
}

function edit($dbConnect, $name, $desc, $pid)
{
    $sql = "UPDATE reviews SET name='$name', description='$desc' WHERE id='$pid'";
    if (mysqli_query($dbConnect, $sql)) {
        echo 'Review Updated';
    } else {
        echo 'Mistakes have been made';
    }
}

function deleteReviews($dbConnect, $uid)
{
    $sql = "SELECT * FROM reviews WHERE userId = $uid";
    $result = mysqli_query($dbConnect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<p><a href="delete.php?id=' . $row['id'] . '">[ Delete ]</a> ' . $row['name'] . '</p>';
        }
    }
}

function delete($dbConnect, $id)
{
    $sql = "DELETE FROM reviews WHERE id = $id";
    if (mysqli_query($dbConnect, $sql)) {
        echo 'Review Deleted';
    } else {
        echo 'Mistakes have been made';
    }
}
