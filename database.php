<?php
//połaczenie z MySql
$con = mysqli_connect("localhost", "Michal", "michal", "advertisements");

//test połaczenia
if(mysqli_connect_errno()) {
    echo "Nie można połączyć się z bazą danych: " . $mysqli_connect_errno();
}

?>