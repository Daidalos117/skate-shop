<?php
session_start();
include_once "db.inc";
if(isset($_SESSION["logged"]) and $_SESSION["logged"] != true){
    header("Location: index.html?error=mitebytprihlasen");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Obchod</title>
    <link href="../css.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <header>
        <a href="../index.php">
            <img src="../skateboard.svg" class="logo">
            <h1>Štěpáns shop</h1>
        </a>
    </header>
    <div class="left-menu">
        <ul>
            <li><a href="new.php" >Přidat nové zboží</a></li>
            <li><a href="items.php" >Editovat stávající</a></li>
            <li><a href="logout.php" >Odhlásit</a></li>
        </ul>
    </div>
    <div class="container">
        <?= $message ?>
        <h2>Všechno zboží</h2>
        <table class="items">
            <tr>
                <th>Jméno</th>
                <th>Cena</th>
                <th>Přidáno</th>
                <th>Editovat</th>
                <th>Smazat</th>
            </tr>

            <?php
            $sql = "SELECT * FROM `tbl_items` WHERE 1 ".$where." ORDER BY id DESC";
            $query = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "    <td>".$row["name"]."</td>";
                echo "    <td>".$row["price"]."</td>";
                echo "    <td>".$row["added"]."</td>";
                echo "    <td><a href='edit.php?id=".$row["id"]."'>Edit</a> </td>";
                echo "    <td><a href='delete.php?id=".$row["id"]."' onclick='return alert(event);'>Delete</a> </td>";
                echo "</tr>";

            }

            ?>
        </table>
    </div>
    <footer>
        <p>
            Vytvořeno Štěpánem Faměrou
        </p>
    </footer>
</div>
</body>
<script>

    function alert(event) {
        var r = confirm("Opravdu chcete tento příspěvek smazat?");
        if (r == true) {
            return true;
        } else {
            return false;
        }
    }

</script>
</html>