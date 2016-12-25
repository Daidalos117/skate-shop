<?php
include_once "admin/db.inc";
if(isset($_GET["id"])){
    $id = mysqli_escape_string($connect,strip_tags($_GET["id"]));
    $where = " AND id='".$id."' ";
}
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

            <?php
            $sql = "SELECT * FROM `tbl_items` WHERE 1 ".$where." LIMIT 1";
            $query = mysqli_query($connect, $sql);

            $row = mysqli_fetch_array($query);

            echo "       
            <div class='info'>
                  <h2>".$row["name"]."</h2>
            ";
            if(!empty($row['picture'])){
                echo "<img src='".$row['picture']."'>";
            }
            echo "<div class='tags'>";
            $sqlT = "SELECT * FROM `tbl_tags` WHERE `item_id` ='".$row['id']."'";
            $queryT = mysqli_query($connect, $sqlT);
            while($tags = mysqli_fetch_array($queryT)) {
                echo "<span>".$tags["tag"]."</span>";
            }
            echo "</div>";
            echo " 
                <p class='detail'> ".$row['detail']."</p>
                
                <p>Přidáno: ".$row['added']."</p>
                
                <p>Cena : <span>".$row["price"]." Kč</span></p>
    
            </div>  ";



            ?>



    </div>
    <footer>
        <p>
            Vytvořeno Štěpánem Faměrou
        </p>
    </footer>
</div>
</body>
</html>