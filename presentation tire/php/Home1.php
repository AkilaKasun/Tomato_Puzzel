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
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <script src="../includes/index.js"></script>
    <title>TomatoPuzzel</title>

    <style>
        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .textonimg1 {
            color: #737d24;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 54px;
            font-weight: bolder;
            font-family: 'Brush Script MT', cursive;
        }
        .textonimg2 {
            position: absolute;
            top: 72%;
            left: 54%;
            transform: translate(-50%, -50%);
            font-size: 30px;
            align-items: left;
            text-align: left;
            font-family: 'Brush Script MT', cursive;
            color: black;
        }
    </style>
</head>

<body>

    <div class="preloader">
        <img id="logo" src="../gif/preload5.gif" />
    </div>
    </div>

    <div class="img">

        <div class="container">
            <div class="content">

                <h1 class="indexTitle"> Tomato Puzzel</h1>
                <img id="quiz-image" src="../images/board.png" alt="">
                <div class="textonimg1">How To Play</div>
                <div class="textonimg2">
                1. Signup using your credentials </br>
                2. If you already have account log in to the game using credentials </br>
                3. There are 3 levels in this game </br>
                4 .You have to complete all 3 levels to score marks</br>
                Good luck! 
                </div>
           
                <a href="Home2.php"><button class="btn">Start Playing</button></a>

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