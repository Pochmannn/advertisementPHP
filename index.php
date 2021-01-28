<?php include "database.php"; ?>
<?php 
    //wyciagam wszystkie wpisy
    $query = "SELECT * FROM advertisements";
    $wpisy = mysqli_query($con, $query);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <title>Advertisement</title>
</head>
<body>
    <div id="informator">   
        <header>
            <h2>Informacja</h2>
        </header>
        <div id="informacje">
            <ul>
                <li class="infor">
                    <?php
                    echo "<b>Godzina</b>: " . date("H:i", time()) . "" 
                    ?>
                </li>
                <li class="infor">
                    <?php
                    echo "<b>Dzień</b>: " . date("d") . "" 
                    ?>
                </li>
                <li class="infor">
                    <?php
                    echo "<b>Miesiąc</b>: " . date("m") . "" 
                    ?>
                </li>
                <li class="infor">
                    <?php
                    echo "<b>Rok</b>: " . date("Y") . "" 
                    ?>
                </li>
            </ul>
        </div>
    </div>



    <div id="zawartosc">
        <header>
            <h1>Ogłoszenia</h1>
        </header>
        <div id="ogloszenia">
            <ul class = "ogloszenieul">
            <?php while($wiersz = mysqli_fetch_assoc($wpisy)) : ?>             
                    <li class = "nazwa">
                        <?php echo $wiersz["user"] ?>                                               
                    </li>
                    <li class = "tekst">
                        <?php echo $wiersz["message"] ?>                              
                    </li>   
                    <li class = "cena">
                        <?php echo $wiersz["price"] ?>                                        
                    </li> 
                    <li class = "data">
                        <?php echo $wiersz["date"] ?>                                      
                    </li> 
            <?php endwhile; ?>        
            </ul>
        </div>

        <div id="formularz">
        <form action="process.php" method="post">
                <input type="text" class="fnazwa" name="nazwa" placeholder="Wpisz nazwę użytkownika">
                <input type="text" class="ftekst" name="ogloszenie" placeholder="Wpisz treść ogłoszenia">
                <input type="text" class="fcena" name="cena" placeholder="Wpisz cenę razem z walutą">
                
                <input type="submit" name="zatwierdz" value="Dodaj ogłoszenie">
        </form>
        </div>
    </div>    
</body>
</html>