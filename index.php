<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dziennik ocen</title>
</head>
<body>

<?php



if(isset($_POST["zapisz"])) //zapisywanie oceny, przechowywanie danych 
{

    $uczen = $_POST["uczen"];
    $ocena = $_POST["ocena"];
    $przedmiot = $_POST["przedmiot"];

   
    $plik = fopen("oceny.txt", "a");  // otwieranien pliku


    fwrite($plik, $uczen . " | " . $przedmiot . " | ocena: " . $ocena . "\n"); //to co sie bedzie wyswietlac w pliku

  
    fclose($plik); //zamykanie
}

?>

<h1>Dziennik ocen</h1>


<form method="POST"> 

    Imię i nazwisko ucznia:
    <input type="text" name="uczen">

    <br><br>

    Ocena:
<select name="ocena">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
    </select>

    <br>  
    <br>

    Przedmiot:
    <input type="text" name="przedmiot">

    <br>
    <br>

    <input type="submit" name="zapisz" value="Zapisz ocenę">

</form>






<h2>Zapisane oceny</h2>

<?php

if(file_exists("oceny.txt")) // sprawdzenie czy plik istnieje
{

    $plik = fopen("oceny.txt", "r"); //otwieranie pliku

    $zawartosc = fread($plik, filesize("oceny.txt")); //czytanie zawartosci

    echo nl2br($zawartosc); //wyswietlanie zawartosci

    fclose($plik); //zamykanie

}


?>

</body>
</html>
