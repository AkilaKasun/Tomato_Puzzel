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
    <link rel="stylesheet" href="../CSS/player1.css" type="text/css">
    <title>TomatoPuzzel</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        
        let score = localStorage.getItem('score') || 0;
        let timeLeft2 = localStorage.getItem('timeLeft2') || 30;
        let numQuestions = 1;

        function updateUI() {
            document.getElementById("question-number").textContent = numQuestions;
            document.getElementById("score").textContent = score;
            document.getElementById("timer").textContent = timeLeft2;
        }

        function handleTimeOut() {
            clearInterval(timer);
            Swal.fire({
                title: "Time's UP !",
                text: "Time's up! Moving on to the next question.",
                icon: "error"
            });
            numQuestions++;
            updateUI();
            if (numQuestions > 5) {
                Swal.fire({
                    title: "Level Passed",
                    text: "Congratulations! You have completed Level.",
                    icon: "success"
                });
                return;
            }
            fetchImage();
        }
        function handleInput() {
            let answer = document.getElementById("answer").value;
            if (answer == solution) {
                score++;
                localStorage.setItem('score', score);
                updateUI();
                numQuestions++;

                if (numQuestions > 5) {
                    if (score >= 3) {
                        // Completed the second level, redirect to player3.php
                        window.location.href = "player3.php";
                    } else {
                        // If the score is less than 3, you can handle it accordingly
                        alert("You need a higher score to proceed to the next level.");
                        // You might want to redirect to a retry page or something else
                    }
                    return;
                }

                Swal.fire({
                    title: "Answered !",
                    icon: "success"
                });

                // Display the correct answer in the 'note' div
                let note = document.getElementById("note");
                note.innerHTML = "Correct Answer: " + solution;

                // Log the correct answer to the console
                console.log("Correct Answer: " + solution);

                // Fetch the next question immediately
                fetchImage();
                note.innerHTML = ''; // Clear the note

                // Reset the question number and time remaining
                updateUI();
            } else {
                Swal.fire({
                    title: "Wrong Answer",
                    text: "That answer is wrong",
                    icon: "error"
                });
            }
        }


        function fetchImage() {
            fetch('https://marcconrad.com/uob/tomato/api.php')
                .then(response => response.json())
                .then(data => {
                    imgApi = data.question;
                    solution = data.solution;
                    document.getElementById("imgApi").src = imgApi;
                    document.getElementById("note").innerHTML = 'Ready?';
                    timeLeft2 = 30;
                    clearInterval(timer);
                    timer = setInterval(() => {
                        timeLeft2--;
                        document.getElementById("timer").textContent = timeLeft2;
                        localStorage.setItem('timeLeft2', timeLeft2);
                        if (timeLeft2 <= 0) {
                            handleTimeOut();
                        }
                    }, 1000);
                })
                .catch(error => {
                    console.error('Error fetching image from the API:', error);
                });
        }

        let timer = setInterval(() => {
            timeLeft2--;
            document.getElementById("timer").textContent = timeLeft2;
            localStorage.setItem('timeLeft2', timeLeft2);
            if (timeLeft2 <= 0) {
                handleTimeOut();
            }
        }, 1000);

        document.addEventListener("DOMContentLoaded", function () {
            updateUI();
            fetchImage();
        });
    </script>

</head>

<body>

    <video autoplay muted loop id="background-video" class="background-video">
        <source src="../video/video.mp4" type="video/mp4">
    </video>

    <div class="img">
        <nav class="navbar">
            <div class="links">
                <a href="Home1.php"><button class="homebtn"><i class="bi bi-house-door-fill"></i></button></a>
                <a href="leaderboard.php"><button class="logoutbtn"><i class="bi bi-arrow-bar-left"></i></button></a>
            </div>
        </nav>

        <div class="container">
            <div class="content">
                <h1 class="indexTitle"> Tomato Puzzel</h1>
                <div class="imgApi">
                    <img src="" alt="Question Image" id="imgApi" class="color-image">
                </div>

                <div class="Data">
                    <span>Question : <span id="question-number">1</span>/5</span> <br>
                    <span>Score : <span id="score">0</span></span><br>
                    <span>Time Left : <span id="timer">15</span></span>
                </div>

                <div class="ans">
                    <p class="txtAns">Enter The Answer : </p>
                    <input type="number" class="input-field" id="answer" placeholder="Enter Answer" min="0">
                    <button type="button" class="btn" onclick="handleInput()">Submit</button>
                </div>

                <div id="note"></div>
            </div>
        </div>

        <div class="right-col">
            <img src="../images/Sound%20webpage_img/play.png" id="icon" alt="">
        </div>
    </div>

    <audio id="music">
        <source type="audio/mp3" src="../Music/y2mate.com%20-%20Kevin%20MacLeod%20%20Pixelland%20%20NO%20COPYRIGHT%208bit%20Music.mp3">
    </audio>

    <script>
        var music = document.getElementById("music");
        var icon = document.getElementById("icon");

        icon.onclick = function () {
            if (music.paused) {
                music.play();
                icon.src = "./images/Sound webpage_img/pause.png"
            } else {
                music.pause();
                icon.src = "./images/Sound webpage_img/play.png"
            }
        }
    </script>
</body>
</html>
