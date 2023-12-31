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
    <link rel="stylesheet" href="../CSS/home2.css" type="text/css">
    <title>TomatoPuzzel</title>
</head>

<body>



    <div class="img">
        <nav class="navbar">

            <div class="links">
                <a href="Home1.php"><button class="backbtn"><i class="bi bi-back"></i></button></a>
                <a href="Home1.php"><button class="homebtn"><i class="bi bi-house-door-fill"></i></button></a>
            </div>
        </nav>

        <div class="container">
            <div class="content">

                <h1 class="indexTitle"> Tomato Puzzel</h1>
                <img id="quiz-image" src="../gif/tomato1.gif" alt="">
                <div class="top-buttons">
                    <a href="login.php"><button class="btn">Sign in</button></a>
                    <a href="register.php"> <button class="btn">Sign up</button></a>
                </div>

                <div class="bottom-buttons">
                    <a href="Home1.php"><button class="btn">Home</button></a>
                    <a href="about.php"><button class="btn">About</button></a>
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