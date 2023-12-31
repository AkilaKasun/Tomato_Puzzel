<?php
session_start();

if (isset($_POST["submit"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];


    $conn = mysqli_connect("localhost", "root", "", "TomatoPuzzel");

    if (!$conn) {
        die("Cannot connect our DB Seaver");
    }

    // Prepare a SQL query to check if the email and username already exist in the database
    $sql = "SELECT email, fullname FROM users WHERE fullname = '" . $_POST['fullname'] . "' OR email = '" . $_POST['email'] . "'";



    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the email and username already exist
    $emailExists = false;
    $fullnameExists = false;
    $passwordMismatch = false;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] === $_POST['email']) {
            $emailExists = true;
        }
        if ($row['fullname'] === $_POST['fullname']) {
            $fullnameExists = true;
        }
    }
    // Check if password and confirm password match
    /*if ($password !== $confirmpassword) {
        $passwordMismatch = true;
    }*/

    // If email or username already exists, display an error message and stop execution
    if ($emailExists) {
        echo "<script>alert('Error: This email address is already registered. Please use a different email address.')</script>";
        echo "<script>window.history.back()</script>";
        exit();
    }
    if ($fullnameExists) {
        echo "<script>alert('Error: This username is already taken. Please use a different username.')</script>";
        echo "<script>window.history.back()</script>";
        exit();
    }
    /*if ($passwordMismatch) {
        echo "<script>alert('Error: Password and confirm password do not match. Please try again.')</script>";
        echo "<script>window.history.back()</script>";
        exit();
    }*/

    //$sql1="ALTER TABLE users MODIFY COLUMN score INT NOT NULL DEFAULT 0";
//$sql1="ALTER TABLE users MODIFY score INT NULL";
//$result = mysqli_query($conn, $sql1);

    // If email and username do not already exist, insert the data into the database
//$sql = "INSERT INTO users (email, username, password,score) VALUES ('" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $_POST['password'] . "','" . $_POST['score'] . "')";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (fullname,email, password) VALUES ( '" . $_POST['fullname'] . "','" . $_POST['email'] . "', '" . $hashedPassword . "')";


    if (mysqli_query($conn, $sql)) {
        // Redirect the user to the login page
        header("Location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

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

            <div class="regform-wrapper ">

                <h1 class="text-center">Sign up</h1>
                <form class="regform-align" method="post" action="register.php" onsubmit="return validateForm(event)">
                    <div class="regform-group">
                        <label for="fullName">Full Name :</i></label>
                        <input type="text" class="input-field" name="fullname" id="fullname"
                            placeholder="Enter Full Name" required>
                    </div>
                    <div class="regform-group">
                        <label for="email">Email :</i></label>
                        <input type="text" class="input-field" name="email" id="email" placeholder="Enter email"
                            required>
                    </div>

                    <div class="regform-group">
                        <label for="password">Password :</i></label>
                        <input type="password" class="input-field" name="password" id="password"
                            placeholder="Enter password" required>

                        <div id="passwordError"></div>
                    </div>

                    <div class="regform-group">
                        <label for="confirmPassword">Confirm Password :</i></label>
                        <input type="password" class="input-field" name="confirmpassword" id="confirmPassword"
                            placeholder="Confirm password" required>
                    </div>
                    <div class="text-center">
                        <button class="cancelbtn" name="btnReset" type="reset" class=" id=" btnReset">Cancel</button>
                        <button class="regformBtn" type="submit" name="submit" id="submit"
                            value="submit">Register</button>
                    </div>
                </form>
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


    <script>
        function checkEmail() {
            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email.value)) {
                alert('Please provide a valid email address');
                email.focus();
                return false;
            }
            return true;
        }

        function checkPassword() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Password and Confirm Password do not match');
                return false;
            }
            return true;
        }

        /*function validatePassword() {
            var password = document.getElementById('password').value;
            var errorDiv = document.getElementById('passwordError');
            var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;

            if (!regex.test(password)) {
                var errorMessage = 'Password must be at least 8 characters long and contain at least one number, one lowercase letter, and one uppercase letter';
                alert(errorMessage);
                errorDiv.style.color = 'red';
                return false;
            } else {
                errorDiv.innerHTML = '';
                return true;
            }
        }*/

        function validateAll(event) {
            if (checkEmail() && checkPassword()) {
                alert('The registration has been done successfully');
            } else {
                event.preventDefault();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var form = document.querySelector('.regform-align');
            form.addEventListener('submit', validateAll);
        });
    </script>



</body>

</html>