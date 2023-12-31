<?php
session_start();

if (isset($_POST["submit"])) {
    // establish database connection
    $conn = mysqli_connect("localhost", "root", "", "tomatopuzzel");

    // check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    // prepare the SQL query to retrieve the user with the given email
    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

   
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // verify the hashed password
        if (password_verify($password, $row['password'])) {
            // set the session variable to indicate that the user is logged in
            $_SESSION['email'] = $email;
            // redirect to the other page
            header('Location: player.php');
            exit;
        } else {
            // if the password is incorrect, display an error message
            echo "<script>alert('Error: Incorrect password.')</script>";
            echo "<script>window.history.back()</script>";
            exit();
        }
    } else {
        // if the email is not found, display an error message
        echo "<script>alert('Error: Email not found.')</script>";
        echo "<script>window.history.back()</script>";
        exit();
    }

    // close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/login.css" type="text/css">

    <title>Tomato Puzzel</title>
</head>

<body>
    <div class="img">
        <nav class="navbar">

            <div class="links">
                <a href="Home2.php"><button class="backbtn"><i class="bi bi-back"></i></button></a>
                <a href="Home1.php"><button class="homebtn"><i class="bi bi-house-door-fill"></i></button> </a>

            </div>
        </nav>

        <div class="container">
            <h1 class="indexTitle">Tomato Puzzel</h1>
            <div class="form-wrapper">
                <h1 class="text-center">Login</h1>
                <form class="form-align" method="post" action="login.php">

                    <div class="form-group">
                        <label for="email"><i class="bi bi-person-circle"></i></label>
                        <input type="email" class="input-field" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="bi bi-lock-fill"></i></i></label>
                        <input type="password" class="input-field" id="password" name="password"
                            placeholder="Enter Password">

                    </div>
                    <div class="text-center">
                        <button class="loginbtn" id="submit" value="submit" name="submit">Signin</button>
                    </div>
                </form>
                <div class="text-center">
                    <h5 class="regtxt">Don't Have a Profile? </h5>
                    <a href="register.php"><button class="regbtn">Signup</button></a>
                </div>
            </div>
        </div>
        <div class="right-col">


            <img src="../images/Sound%20webpage_img/play.png" id="icon" alt="">
        </div>
    </div>

    <audio id="music">
        <source type="audio/mp3" src="../Music/y2mate.com%20-%20Kubbi%20%20Up%20In%20My%20Jam%20%20NO%20COPYRIGHT%208bit%20Music.mp3">

    </audio>
    <script>
        var music = document.getElementById("music");
        var icon = document.getElementById("icon");

        icon.onclick = function () {
            if (music.paused) {
                music.play();
                icon.src = "./images/Sound webpage_img/pause.png"
            }
            else {

                music.pause();
                icon.src = "./images/Sound webpage_img/play.png"
            }
        }
    </script>

</body>

</html>