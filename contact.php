<?php
include_once "admin/db.inc";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Obchod</title>
    <link href="css.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <header>
        <a href="index.php">
            <img src="skateboard.svg" class="logo">
            <h1>Štěpáns shop</h1>
        </a>
    </header>
    <div class="menu">
        <a href="index.php">Všechny</a>
        <?php
        $sql = "SELECT `category` FROM `tbl_items` GROUP by category";
        $query = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_array($query)) {
            $category = $row['category'];
            $categoryUrl = urlencode($row['category']);
            echo "<a href='index.php?category=".$categoryUrl."'>".$category."</a> ";
        }
        ?>
        <a href="contact.php">Kontakt</a>
    </div>

    <div class="container">
        <h2>Kontakt</h2>
        <table class="contacts">
            <tr>
                <td>Telefon:</td>
                <td>758 999 847</td>
            </tr>
            <tr>
                <td>Skype:</td>
                <td><a href="mailto:skate@obchod.cz">skate@obchod.cz</a> </td>
            </tr>
            <tr>
                <td>Adresa:</td>
                <td>Skalská 100, Praha</td>
            </tr>
        </table>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1956.9526437395118!2d14.456912728250659!3d50.0042774437985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b916d6b8679cb%3A0x287ec02c828d3064!2sSkalsk%C3%A1%2C+142+00+Praha-Libu%C5%A1!5e0!3m2!1scs!2scz!4v1473624483246" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div style="clear: both"></div>
    </div>

    <footer>
        <p>
            Vytvořeno Štěpánem Faměrou
        </p>
    </footer>
</div>
</body>
</html>