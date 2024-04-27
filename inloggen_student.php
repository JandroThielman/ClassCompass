<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <title>Inloggen Student</title>
</head>
<body>

    <?php

        include 'function.php';

        if (isset($_POST['inloggen-student'])) {
    
         InloggenStudent();

        }

    ?>

    <a href="javascript:history.go(-1)"><img src="./assets/previous.svg" class="previous" title="Previous Page"></a>

    <img src="./assets/logo.jpeg" class="logo-image-docent">
    
        <div class="inloggen-docent-div">

            <h1 class="inloggen-docent-tekst">Inloggen Studenten</h1>

            <form action="" method="post" class="form-inloggen-docent">

                <div class="user-div">
                    <img src="./assets/user.svg" class="user">
                    <input type="text" name="gebruikersnaam-student" placeholder="gebruikersnaam" class="inloggen-docent-input">
                </div>

                <br>

                <div class="wachtwoord-div">
                    <img src="./assets/wachtwoord.svg" class="wachtwoord">
                    <input type="password" name="wachtwoord-student" placeholder="wachtwoord" id="password" class="inloggen-docent-input">
                    <img src="./assets/show-passw.svg" class="passw" id="passw" onclick="pass()">
                </div>
            
                <br>

                <input type="submit" name="inloggen-student" value="Inloggen" class="inloggen-docent-button">
            </form>

        </div>

        <script src="script.js"></script>
    
</body>
</html>