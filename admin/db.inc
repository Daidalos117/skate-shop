<?php
error_reporting(1);
$connect = mysqli_connect("localhost", "root", "root") or die("Administraci se nepodařilo připojit k DB! Kontaktujte technickou podporu ...");
mysqli_select_db($connect,"stepan") or die("DB nebyla vybrána! Kontaktujte technickou podporu ...");
  // Informujeme DB server v jaké češtině má fungovat
  mysqli_query("SET NAMES utf8_czech_ci");
  
  // Ostatní speciální definice - slouží pro definici jednotlivých specifikací
  mysqli_query("SET character_set_connection=utf8_czech_ci");
  // informuje server o tom, v jaké znakové sadě požadujete, aby server data zpracovával.
  mysqli_query("SET character_set_client=utf8_czech_ci");
  // informuje server o tom, jakou znakovou sadu používá klient, tedy v jakém kódování přicházejí textová data
  mysqli_query("SET character_set_results=utf8_czech_ci");
  // informuje server o tom, v jaké znakové sadě požadujete, aby server posílal zpracovaná data na výstup
  mysqli_query("SET character_set_server=utf8_czech_ci");
  mysqli_set_charset('utf-8',$connect);
  
?>
