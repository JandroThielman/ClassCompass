<?php

    function RegisterDocent(){

        include 'config.php';

        $randomNumber = rand(1, 5);

        $foto;

        if ($randomNumber === 1) {
            $foto = 'account-image1.webp';
        } else if ($randomNumber === 2) {
            $foto = 'account-image2.webp';
        } else if ($randomNumber === 3) {
            $foto = 'account-image3.webp';
        } else if ($randomNumber === 4) {
            $foto = 'account-image4.webp';
        } else if ($randomNumber === 5) {
            $foto = 'account-image5.webp';
        }

        $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam-docent'], ENT_QUOTES, 'UTF-8');
        $wachtwoord = password_hash($_POST['wachtwoord-docent'], PASSWORD_DEFAULT);
        $query = $db->prepare("INSERT INTO gebruikerdocent (gebruikersnaam, wachtwoord, foto) VALUES (:gebruikersnaam, :wachtwoord, :foto)");
        $query->bindParam(':gebruikersnaam', $gebruikersnaam);
        $query->bindParam(':wachtwoord', $wachtwoord);
        $query->bindParam(':foto', $foto);
        $query->execute();

        header('Location: pagina1.php');
        exit;

    }

    function RegisterStudent(){

        include 'config.php';

        $randomNumber = rand(1, 5);

        $foto;

        if ($randomNumber === 1) {
            $foto = 'account-image1.webp';
        } else if ($randomNumber === 2) {
            $foto = 'account-image2.webp';
        } else if ($randomNumber === 3) {
            $foto = 'account-image3.webp';
        } else if ($randomNumber === 4) {
            $foto = 'account-image4.webp';
        } else if ($randomNumber === 5) {
            $foto = 'account-image5.webp';
        }

        $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam-student'], ENT_QUOTES, 'UTF-8');
        $wachtwoord = password_hash($_POST['wachtwoord-student'], PASSWORD_DEFAULT);
        $query = $db->prepare("INSERT INTO gebruikerstudent (gebruikersnaam, wachtwoord, foto) VALUES (:gebruikersnaam, :wachtwoord, :foto)");
        $query->bindParam(':gebruikersnaam', $gebruikersnaam);
        $query->bindParam(':wachtwoord', $wachtwoord);
        $query->bindParam(':foto', $foto);
        $query->execute();

        header('Location: pagina1.php');
        exit;

    }

    function InloggenDocent(){

        include 'config.php';

        $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam-docent'], ENT_QUOTES, 'UTF-8');
        $wachtwoord = $_POST['wachtwoord-docent'];
        $query = $db->prepare("SELECT * FROM gebruikerdocent WHERE gebruikersnaam = :gebruikersnaam");
        $query->bindParam("gebruikersnaam", $gebruikersnaam);
        $query->execute();

        if ($query->rowCount() === 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($wachtwoord, $result["wachtwoord"])) {
                header("location: ClassCompass-Docent.php?gebruiker=" . urldecode($gebruikersnaam));
                exit;
            }
        }

    }

    function InloggenStudent(){

        include 'config.php';

        $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam-student'], ENT_QUOTES, 'UTF-8');
        $wachtwoord = $_POST['wachtwoord-student'];
        $query = $db->prepare("SELECT * FROM gebruikerstudent WHERE gebruikersnaam = :gebruikersnaam");
        $query->bindParam("gebruikersnaam", $gebruikersnaam);
        $query->execute();

        if ($query->rowCount() === 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($wachtwoord, $result["wachtwoord"])) {
                header("location: ClassCompass-Student.php?gebruiker=" . urldecode($gebruikersnaam));
                exit;
            }
        }

    }

    function SelectImageDocent(){
        
        include 'config.php';
        $gebruiker = $_GET['gebruiker'];
        $query = $db->prepare("SELECT * FROM gebruikerdocent WHERE gebruikersnaam = :gebruiker");
        $query->bindParam(':gebruiker', $gebruiker);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        echo '<img class="gebruiker-image" src="./assets/' . $result['foto'] . '"/>';

    }

    function SelectImageStudent(){
        
        include 'config.php';
        $gebruiker = $_GET['gebruiker'];
        $query = $db->prepare("SELECT * FROM gebruikerstudent WHERE gebruikersnaam = :gebruiker");
        $query->bindParam(':gebruiker', $gebruiker);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        echo '<img class="gebruiker-image1" src="./assets/' . $result['foto'] . '"/>';

    }

    function CurrentTime(){

        date_default_timezone_set("Europe/Amsterdam");

        $Datum = date("j F Y");

        echo '<h1 class="time">' . $Datum . '</h1>';

    }

    function Table(){
        
        include 'config.php';

        $gebruiker = $_GET['gebruiker'];
        
        $query = $db->prepare("SELECT * FROM maandag");
        $query->execute();
        $maandag = $query->fetchAll(PDO::FETCH_ASSOC);

        $query1 = $db->prepare("SELECT * FROM dinsdag");
        $query1->execute();
        $dinsdag = $query1->fetchAll(PDO::FETCH_ASSOC);

        $query2 = $db->prepare("SELECT * FROM woensdag");
        $query2->execute();
        $woensdag = $query2->fetchAll(PDO::FETCH_ASSOC);

        $query3 = $db->prepare("SELECT * FROM donderdag");
        $query3->execute();
        $donderdag = $query3->fetchAll(PDO::FETCH_ASSOC);

        $query4 = $db->prepare("SELECT * FROM vrijdag");
        $query4->execute();
        $vrijdag = $query4->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="second">';

            foreach ($maandag as $alpha) {
                echo "<div class='maandag-div'>";
                    echo "<a href='aanwezig.php?id=" . $alpha['id'] . "&database=maandag&gebruiker=" . $gebruiker . "'><h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1></a>";
                echo "</div>";
            }
            
        echo '</div>';

        echo '<div class="third">';

            foreach ($dinsdag as $alpha) {
                echo "<div class='maandag-div'>";
                    echo "<a href='aanwezig.php?id=" . $alpha['id'] . "&database=dinsdag&gebruiker=" . $gebruiker . "'><h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1></a>";
                echo "</div>";
            }
        
        echo '</div>';

        echo '<div class="fourth">';

            foreach ($woensdag as $alpha) {
                echo "<div class='maandag-div'>";
                echo "<a href='aanwezig.php?id=" . $alpha['id'] . "&database=woensdag&gebruiker=" . $gebruiker . "'><h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1></a>";
                echo "</div>";
            }
    
        echo '</div>';

        echo '<div class="fifth">';

            foreach ($donderdag as $alpha) {
                echo "<div class='maandag-div'>";
                echo "<a href='aanwezig.php?id=" . $alpha['id'] . "&database=donderdag&gebruiker=" . $gebruiker . "'><h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1></a>";
                echo "</div>";
            }

        echo '</div>';

        echo '<div class="sixth">';

            foreach ($vrijdag as $alpha) {
                echo "<div class='maandag-div'>";
                echo "<a href='aanwezig.php?id=" . $alpha['id'] . "&database=vrijdag&gebruiker=" . $gebruiker . "'><h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1></a>";
                echo "</div>";
            }

        echo '</div>';

    }

    function Table1(){
        
        include 'config.php';
        
        $query = $db->prepare("SELECT * FROM maandag");
        $query->execute();
        $maandag = $query->fetchAll(PDO::FETCH_ASSOC);

        $query1 = $db->prepare("SELECT * FROM dinsdag");
        $query1->execute();
        $dinsdag = $query1->fetchAll(PDO::FETCH_ASSOC);

        $query2 = $db->prepare("SELECT * FROM woensdag");
        $query2->execute();
        $woensdag = $query2->fetchAll(PDO::FETCH_ASSOC);

        $query3 = $db->prepare("SELECT * FROM donderdag");
        $query3->execute();
        $donderdag = $query3->fetchAll(PDO::FETCH_ASSOC);

        $query4 = $db->prepare("SELECT * FROM vrijdag");
        $query4->execute();
        $vrijdag = $query4->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="second">';

            foreach ($maandag as $alpha) {
                echo "<div class='maandag-div'>";
                    echo "<h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1>";
                echo "</div>";
            }
            
        echo '</div>';

        echo '<div class="third">';

            foreach ($dinsdag as $alpha) {
                echo "<div class='maandag-div'>";
                    echo "<h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1>";
                echo "</div>";
            }
        
        echo '</div>';

        echo '<div class="fourth">';

            foreach ($woensdag as $alpha) {
                echo "<div class='maandag-div'>";
                echo "<h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1>";
                echo "</div>";
            }
    
        echo '</div>';

        echo '<div class="fifth">';

            foreach ($donderdag as $alpha) {
                echo "<div class='maandag-div'>";
                echo "<h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1>";
                echo "</div>";
            }

        echo '</div>';

        echo '<div class="sixth">';

            foreach ($vrijdag as $alpha) {
                echo "<div class='maandag-div'>";
                echo "<h1 class='maandag-tekst'>Vak: " . $alpha['vaak'] . '<br> Tijd: ' . $alpha['tijd'] . '<br> Docent: ' . $alpha['docent'] . '<br>Aanwezigheid: ' . $alpha['aanwezigheid'] . "</h1>";
                echo "</div>";
            }

        echo '</div>';

    }

    function GetInfo(){
        include 'config.php';

        $database = $_GET['database'];
        $id  = $_GET['id'];

        $query = $db->prepare("SELECT * FROM $database WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $info) {
            echo "<h1 class='aanwezig-tekst'>Vak: " . $info['vaak'] . "</h1>";
            echo "<h1 class='aanwezig-tekst'>Tijd: " . $info['tijd'] . "</h1>";
            echo "<h1 class='aanwezig-tekst'>Docent: " . $info['docent'] . "</h1><br><br>";
        }

    }

    function Aanwezigheid(){

        include 'config.php';

        if (isset($_POST['aanwezig'])) {

            $database = $_GET['database'];
            $id  = $_GET['id'];
            $gebruiker = $_GET['gebruiker'];
            $aantwoord = $_POST['aanwezigheid'];

            $query1 = $db->prepare("UPDATE $database SET aanwezigheid = :aanwez WHERE id = :id");
            $query1->bindParam(':id', $id);
            $query1->bindParam(':aanwez', $aantwoord);
            $query1->execute();

            header('location: ClassCompass-Docent.php?gebruiker=' . $gebruiker . '');

        }
    }

?>