<?php
include "database.php";


if (isset($_POST["zatwierdz"])) {
    $nazwa = mysqli_real_escape_string($con, $_POST["nazwa"]);
    $ogloszenie = mysqli_real_escape_string($con, $_POST["ogloszenie"]);
    $cena = mysqli_real_escape_string($con, $_POST["cena"]);


    
    date_default_timezone_set("Europe/Warsaw");
    $czas = date("y.m.d", time());

    
    if (!isset($nazwa) || $nazwa== "" || !isset($ogloszenie) || $ogloszenie =="" || !isset($cena) || $cena ==""){
        $error = "Proszę wypełnić nazwę, treść ogłoszenia lub cenę";
        header("Location: index.php?error=".urlencode($error));
        exit();
    } else {
        $query = "INSERT INTO advertisements (user, message, price, date)
                VALUES ('$nazwa', '$ogloszenie', '$cena', '$czas')";
        if (!mysqli_query($con, $query)) {
            die("Błąd: " . mysqli_err($con));
        } else {
            header("Location: index.php");
            exit();
        }
                
    }
}

?>