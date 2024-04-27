<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=portaal", "root", "");
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }

?>