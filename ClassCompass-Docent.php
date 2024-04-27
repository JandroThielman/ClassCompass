<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Classcompass Docenten</title>
</head>
<body class="body-docent">
    
    <nav class="nav">
        <img src="./assets/favicon.png" class="logo-nav">
        <h2 class="nav-tekst">Docenten Rooster</h2>
        <div class="dropdown">
            <?php
                include 'function.php';
                SelectImageDocent();
            ?>
            <div class="dropdown-content">

                <a href="pagina1.php"><button class="log-uit">Log Uit</button></a>

            </div>

        </div>
    </nav>

    <?php

        CurrentTime();

    ?>

<div class="div-main">

    <div class="top-div">

        <div class="top-div2"></div>

        <div class="top-div1">
            <h1 class="text-table">Maandag</h1>
        </div>

        <div class="top-div1">
            <h1 class="text-table">Dinsdag</h1>
        </div>

        <div class="top-div1">
            <h1 class="text-table">Woensdag</h1>
        </div>

        <div class="top-div1">
            <h1 class="text-table">Donderdag</h1>
        </div>

        <div class="top-div1">
            <h1 class="text-table">Vrijdag</h1>
        </div>
    </div>

    <div>
        <div class="first1">
            <h1 class="text-table1">1</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">2</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">3</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">4</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">5</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">6</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">7</h1>
        </div>

        <div class="first1">
            <h1 class="text-table1">8</h1>
        </div>
    </div>

    <?php

        table();

    ?>

</div>

</body>
</html>