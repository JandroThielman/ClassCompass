<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Aanwezigheid</title>
</head>
<body class="body-student">
    
    <nav class="nav1">
        <img src="./assets/favicon.png" class="logo-nav">
        <h2 class="nav-tekst">Student Rooster</h2>
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

    <a href="javascript:history.go(-1)"><img src="./assets/previous.svg" class="previous1" title="Previous Page"></a>

    <div class="body-aanwezig">

        <img src="./assets/logo.jpeg" class="logo-image">

        <form method="post" class="aanwezig">

            <?php

                GetInfo();
                Aanwezigheid();

            ?>

            <label class="aanwezig-label">Aanwezigheid:</label>
            <br>
            <select class="select-aanwezigheid" name="aanwezigheid">
                <option class="option-aanwezigheid" value="Aanwezig">Aanwezig</option>
                <option class="option-aanwezigheid" value="Afwezig">Afwezig</option>
                <option class="option-aanwezigheid" value="Vakantie">Vakantie</option>
                <option class="option-aanwezigheid" value="Ziek">Ziek</option>
            </select>
            <br>
            <button name="aanwezig" class="button-aanwezigheid" type="submit">Zetten</button>

        </form>

    </div>

</body>
</html>