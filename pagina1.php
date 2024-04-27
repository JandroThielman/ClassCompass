<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Portaal</title>
</head>
<body>

    <img src="./assets/logo.jpeg" class="logo-image">

    <div class="form-div">

        <h1 class="tekst">Portaal</h1>

        <a href="inloggen_docent.php"><button name="inloggen-docent" class="button-design hover1">Inloggen Docent</button></a>
        <br><br>
        <a href="inloggen_student.php"><button name="inloggen-student" class="button-design hover2">Inloggen Student</button></a>

        <p class="link-account-maken" onclick="boxOpen()">Account Maken</p>

    </div>

    <div class="box" id="box">

        <div class="close-tab">
            <p class="close-tekst">Account Maken
            <img src="./assets/close.png" title="close" class="close" onclick="boxClose()">
            </p>
        </div>

        <a href="register_docent.php"><button name="register-docent" class="button-design1 button-des1">Docent</button></a>

        <a href="register_student.php"><button name="register-student" class="button-design1">Student</button></a>

    </div>

    <script src="script.js"></script>

</body>
</html>