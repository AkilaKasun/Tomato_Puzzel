<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/login.css" type="text/css">
</head>

<body>
    <div class="img">
        <div class="about" align="center">
            </br></br>
            <h1 align="center">About Us</h1>
            </br></br></br></br></br>
            <h3>Welcome to our game!Tomato Puzzel is a mathematical quiz game which was designed and developed by </h3>
            <h3>W.A.D.A.K Weerasuriya, Uob number-2323493, </h3>
            <h3>who is dedicated to providing high-quality game services to our clients.</h3>
            <h3>Our mission is to help grow and thrive by providing our users with innovative solutions that are
                tailored to
                their specific needs.</h3>
            <h3>If you have any questions or comments, please don't hesitate to contact us. We would love to hear from
                you!
            </h3><br><br>

            <h3>Email:akilakasun100100@gmail.com</h3>
            </br></br></br></br></br></br>



        </div>
        <a href="Home2.php"><button class="backbtn"><i class="bi bi-back"></i></button></a>

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